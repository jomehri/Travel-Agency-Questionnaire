<?php

namespace App\Http\Requests\Api\User;

use App\Exceptions\User\UserDoesNotHaveAdminRoleException;
use App\Exceptions\User\UserIsAlreadySuperAdminException;
use App\Models\BaseModel;
use App\Models\Questions\Question;
use Illuminate\Validation\Rule;
use App\Models\Questions\Questioner;
use App\Http\Requests\Api\BaseRequest;

class UserRoleAddRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->authorizeUserRole('admin');
    }

    /**
     * Get the validations rules that apply to the request.
     *
     * @return array
     * @throws UserIsAlreadySuperAdminException
     */
    public function rules(): array
    {
        $this->throwIfTargetUserAlreadyIsSuperAdmin();

        return [];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [];
    }

    /**
     * @return void
     * @throws UserIsAlreadySuperAdminException
     */
    public function throwIfTargetUserAlreadyIsSuperAdmin(): void
    {
        /** @var Questioner $questioner */
        $targetUser = $this->route('user');

        if ($targetUser->hasRole('admin')) {
            throw new UserIsAlreadySuperAdminException();
        }
    }


}
