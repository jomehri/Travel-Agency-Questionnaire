<?php

namespace App\Http\Controllers\Api\Questions;

use App\Http\Requests\Api\Questions\QuestionGroupStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\Questions\QuestionerService;
use App\Http\Controllers\Api\BaseApiController;
use App\Services\Questions\QuestionGroupService;
use App\Http\Requests\Api\Questions\QuestionerStoreRequest;

class QuestionGroupApiController extends BaseApiController
{

    /**
     * @param Request $request
     * @param QuestionGroupService $questionGroupService
     */
    public function __construct(Request $request, QuestionGroupService $questionGroupService)
    {
        $this->request = $request;
        $this->questionGroupService = $questionGroupService;
    }

    /**
     * @OA\post (
     *  path="/api/question-groups",
     *  security={{"sanctum":{}}},
     *  summary="Add new question group",
     *  description="Add new question group (connected to several questioners)",
     *  tags={"Question Group"},
     *  @OA\RequestBody(
     *      required=true,
     *      description="Add new question group, <br><strong>optional:</strong> you can attach this question group to multiple questioners by questioner_ids array",
     *      @OA\JsonContent(
     *          @OA\Property(property="title", type="string",example="دسته سوالات شماره 1", nullable="false"),
     *          @OA\Property(
     *              property="questioner_ids",
     *              type="array",
     *              example="[1, 2]",
     *              @OA\Items(),
     *          ),
     *      ),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="success",
     *      @OA\JsonContent(
     *          @OA\Property(property="sucess", type="string", example="success"),
     *      )
     *  ),
     *  @OA\Response(
     *      response=422,
     *      description="bad request",
     *  ),
     * ),
     *
     * @param QuestionGroupStoreRequest $questionGroupStoreRequest
     * @return JsonResponse
     */
    public function store(QuestionGroupStoreRequest $questionGroupStoreRequest): JsonResponse
    {
        $data = $this->questionGroupService->sanitizeStoreRequestData($this->request);

        $this->questionGroupService->store($data);

        return $this->returnOk(null);
    }

}
