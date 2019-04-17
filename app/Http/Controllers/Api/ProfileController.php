<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfileController extends ApiController
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        return response(null, Response::HTTP_CREATED);
    }

    /**
     * @param string $name
     * @return JsonResponse
     */
    public function show(string $name): JsonResponse
    {
        return response()->json();
    }

    /**
     * @param Request $request
     * @param string $name
     * @return Response
     */
    public function update(Request $request, string $name): Response
    {
        return response(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @param string $name
     * @return Response
     */
    public function destroy(string $name): Response
    {
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
