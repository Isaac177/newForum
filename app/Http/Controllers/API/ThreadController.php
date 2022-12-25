<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThreadStoreRequest;
use App\Jobs\CreateThread;
use App\Jobs\UpdateThread;
use App\Models\Thread;
use App\Policies\ThreadPolicy;
use Illuminate\Auth\Access\AuthorizationException;

class ThreadController extends Controller
{
    public function store(ThreadStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        $this->dispatchSync(CreateThread::fromRequest($request));
        return response()->json([
            'message' => 'Thread created successfully',
            'status' => 'success',
        ], 200);
    }

    public function show(Thread $thread)
    {
        return (new ThreadResource($thread))->response();
    }

    public function update(Thread $thread, ThreadStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        $this->authorize(ThreadPolicy::UPDATE, $thread);

        $this->dispatchSync(UpdateThread::fromRequest($thread, $request));
        return response()->json([
            'message' => 'Thread updated successfully',
            'status' => 'success',
        ], 200);
    }

    public function destroy(Thread $thread): \Illuminate\Http\JsonResponse
    {
        if (auth()->user()->cannot(ThreadPolicy::DELETE, $thread)) {
            throw new AuthorizationException('You are not authorized to delete this thread');
        } else {
            $thread->delete();
            return response()->json([
                'message' => 'Thread deleted successfully',
                'status' => 'success',
            ], 200);
        }
    }

    public function index()
    {
        $threads = Thread::all();
        return response()->json([
            'message' => $threads,
            'status' => 'success',
        ], 200);
    }
}

