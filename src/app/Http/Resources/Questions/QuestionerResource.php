<?php

namespace App\Http\Resources\Questions;

use App\Http\Resources\User\UserQuestionGroupResource;
use App\Models\BaseModel;
use App\Models\Questions\Question;
use App\Models\Questions\Questioner;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionerResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            BaseModel::COLUMN_ID => $this->{BaseModel::COLUMN_ID},
            Questioner::COLUMN_TITLE => $this->{Questioner::COLUMN_TITLE},
            Questioner::COLUMN_SLUG => $this->{Questioner::COLUMN_SLUG},
            Questioner::COLUMN_PRICE => $this->{Questioner::COLUMN_PRICE},
            'question_groups' => QuestionGroupWithoutQuestionerResource::collection($this->questionGroups),
            'question_groups_count' => QuestionGroupWithoutQuestionerResource::collection($this->questionGroups)->count(),
            'questions_count' => Question::forQuestioner($this->id)->count('id'),
            'userQuestionGroup' => UserQuestionGroupResource::collection($this->whenLoaded('userQuestionGroups'))
        ];
    }
}
