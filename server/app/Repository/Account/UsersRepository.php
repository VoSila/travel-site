<?php

namespace App\Repository\Account;

use App\Models\User as UserModel;
use App\Repository\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


class UsersRepository
{
    /**
     *  * Find user model by id
     *
     * @param int $id
     *
     * @return Model|Builder|null
     */
    public function findById(int $id): Model|Builder|null
    {
        return UserModel::query()
            ->where(UserModel::ID, '=', $id)
            ->first();
    }

    /**
     * Edit tour model
     *
     * @param int $id
     * @param string|null $image
     * @param string $name
     * @param string|null $surname
     * @param string|null $city
     * @param string $email
     *
     *
     * @return Builder|array|Model
     */
    public function edit(int $id, string|null $image, string $name, string|null $surname, string|null $city, string $email): Model|Builder|array
    {
        /** @var UserModel $user */
        if ($user = UserModel::query()->find($id)) {
            $user->setName($name)
                ->setImage($image)
                ->setSurname($surname)
                ->setCity($city)
                ->setEmail($email);

            $this->save($user);
        }
        return $user;
    }

    /**
     * Find image user model by id
     *
     * @param int $id
     *
     * @return UserModel|Model|null
     */
    public function getImageById(int $id): UserModel|Model|null
    {
        return UserModel::query()
            ->select('image')
            ->where('id', $id)
            ->first();
    }

    public function findReviewById(int $id): Collection
    {
        return UserModel::query()
            ->join('users', 'subscriptions.user_id', '=', 'users.id')
            ->join('plans', 'subscriptions.name', '=', 'plans.id')
            ->where('users.stripe_id', $id)
            ->select('plans.name')
            ->get();
    }



    /**
     * Save user model
     *
     * @param UserModel $notes
     *
     *
     * @return void
     */
    private function save(UserModel $tours): void
    {
        $tours->save();
    }
}
