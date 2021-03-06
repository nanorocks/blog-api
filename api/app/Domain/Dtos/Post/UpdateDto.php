<?php

namespace App\Domain\Dtos\Post;

use App\Models\Post;
use App\Helpers\GenerateUniqueId;
use App\Http\Requests\Post\UpdateRequest;
use Spatie\DataTransferObject\DataTransferObject;

class UpdateDto extends DataTransferObject
{
    public string $title;
    public string $subTitle;
    public string $text;
    public string $date;
    public ?int $status;
    public ?string $references;
    public string $image;
    public string $metaBudges;
    public string $category;
    public int $userId;

    public static function fromRequest(UpdateRequest $request): self
    {
        return new self([
            Post::TITLE => $request->getParams()->title,
            Post::SUB_TITLE => $request->getParams()->subTitle,
            Post::TEXT => $request->getParams()->text,
            Post::DATE => $request->getParams()->date,
            Post::STATUS => intval($request->getParams()->status),
            Post::REFERENCES => $request->getParams()->references,
            Post::IMAGE => $request->getParams()->image,
            Post::META_BUDGES => $request->getParams()->metaBudges,
            Post::CATEGORY => $request->getParams()->category,
            Post::USER_ID => $request->userId
        ]);
    }
}
