<?php

namespace App\Http\Requests\Config;

use App\Domain\Dtos\Config\UpdateDto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Config;

class UpdateRequest extends Controller
{
    public function __construct(Request $request)
    {
        $this->validate(
            $request,
            [
                Config::PAGE_TITLE => 'required',
                Config::PAGE_DESCRIPTION => 'required',
            ]
        );

        parent::__construct($request);
    }

    public function convertToDto(): UpdateDto
    {
        return UpdateDto::fromRequest($this);
    }
}
