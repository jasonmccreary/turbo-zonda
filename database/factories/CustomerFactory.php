<?php

use App\Domain\Customers\Entities\Customer;
use App\Domain\Employees\Entities\Employee;
use App\Domain\Shared\Entities\Address;
use App\Domain\Shared\Entities\PaymentMethod;
use App\Domain\Shared\Entities\PaymentTerm;
use App\Domain\Shared\Entities\ShippingService;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

/**@var Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name'            => $faker->company,
        'number'          => $faker->numerify('#####'),
        'credit_limit'    => $faker->randomFloat(2),
        'hourly_rate'     => $faker->randomFloat(2, 0, 9999),
        'ot_rate'         => $faker->randomFloat(2, 0, 9999),
        'lm_rate'         => $faker->randomFloat(2, 0, 9999),
        'lm_ot_rate'      => $faker->randomFloat(2, 0, 9999),
        'current_balance' => $faker->randomFloat(2),

        'shipping_service_id' => function () use ($faker) {
            return $faker->randomElement(ShippingService::all()->pluck('id')->toArray());
        },
        'phone'               => $faker->phoneNumber,
        'fax'                 => '+'.$faker->numerify('##-###-#######'),
        'employee_id'         => function () {
            return factory(Employee::class)->create()->id;
        },
        'payment_term_id'     => function () use ($faker) {
            return $faker->randomElement(PaymentTerm::all()->pluck('id')->toArray());
        },
        'payment_method_id'   => function () use ($faker) {
            return $faker->randomElement(PaymentMethod::all()->pluck('id')->toArray());
        },
        'contact'             => $faker->firstName.' '.$faker->lastName,
        'notes'               => Arr::random([null, null, $faker->sentence]),
        'status'              => 1,
        'created_by'          => 3,
        'updated_by'          => 3,
    ];
})->afterCreatingState(Customer::class, 'addresses', function (Customer $customer) {
    $customer->shipping_addresses()->saveMany($customer->getRelation('shipping_addresses'));
    $customer->billing_addresses()->saveMany($customer->getRelation('billing_addresses'));
})->afterMakingState(Customer::class, 'addresses', function (Customer $customer, Faker $faker) {
    $shippingAddressDefault = factory(Address::class)->states([
        'shipping',
        'default',
    ])->make();

    $billingAddressDefault = factory(Address::class)->states([
        'billing',
        'default',
    ])->make();

    $shippingAddresses = factory(Address::class, $faker->numberBetween(2, 4))->make();
    $billingAddresses = factory(Address::class, $faker->numberBetween(2, 4))->make();

    $shippingAddresses->push($shippingAddressDefault);
    $billingAddresses->push($billingAddressDefault);

    $customer->setRelation('shipping_addresses', $shippingAddresses);
    $customer->setRelation('billing_addresses', $billingAddresses);
});
