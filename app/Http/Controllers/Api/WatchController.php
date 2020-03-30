    public function store(WatchStoreRequest $request)
    {
        $watch = Watch::create($request->all());

        return response(null, 204);
    }