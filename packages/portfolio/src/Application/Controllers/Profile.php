<?php

namespace Halnique\Portfolio\Application\Controllers;


use Halnique\Portfolio\Application\UseCases;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Profile extends Controller
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
     * @param UseCases\Profile\FindByName $findByName
     * @param string $name
     * @return JsonResponse
     */
    public function show(UseCases\Profile\FindByName $findByName, string $name): JsonResponse
    {
        return response()->json($findByName($name));
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
