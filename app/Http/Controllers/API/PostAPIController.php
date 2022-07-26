<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePostAPIRequest;
use App\Http\Requests\API\UpdatePostAPIRequest;
use App\Http\Resources\WebsiteResource;
use App\Models\Post;
use App\Models\UserSubscribeWebsite;
use App\Models\Website;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\PostResource;
use Illuminate\Support\Str;
use Response;

/**
 * Class PostController
 * @package App\Http\Controllers\API
 */

class PostAPIController extends AppBaseController
{
    /** @var  PostRepository */
    private $postRepository;

    public function __construct(PostRepository $postRepo)
    {
        $this->postRepository = $postRepo;
    }

    /**
     * Display a listing of the Post.
     * GET|HEAD /posts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $posts = $this->postRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(PostResource::collection($posts), 'Posts retrieved successfully');
    }

    /**
     * Store a newly created Post in storage.
     * POST /posts
     *
     * @param CreatePostAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePostAPIRequest $request)
    {
        $input = $request->all();
        $input['website_id'] = Website::whereDomain($input['website_domain'])->firstOrFail()->id;
        $input['slug'] = Str::slug($input['title']);

        $post = $this->postRepository->create($input);

        return $this->sendResponse(new PostResource($post), 'Post saved successfully');
    }

    /*public function update($id, UpdatePostAPIRequest $request)
    {
        $input = $request->all();
        $post = $this->postRepository->find($id);

        if (empty($post)) {
            return $this->sendError('Post not found');
        }

        $post = $this->postRepository->update($input, $id);

        return $this->sendResponse(new PostResource($post), 'Post updated successfully');
    }*/

    public function subscribe(UpdatePostAPIRequest $request)
    {
        $input = $request->all();
        $input['website_id'] = Website::whereDomain($input['website_domain'])->firstOrFail()->id;
        $userSubscribe = UserSubscribeWebsite::create($input);

        return $this->sendResponse($userSubscribe, 'User subscribed successfully');
    }
}
