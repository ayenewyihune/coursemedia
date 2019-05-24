<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Response;
use Validator;

class CommentsController extends Controller
{

    // Shows comments for each course chapters using AJAX
    public function ajax_show(Request $request)
    {
        if ($request->ajax()) {
            $current_chapter_id = $request->get('id');
            $comments = Comment::where(['commentable_id' => $current_chapter_id, 'commentable_type' => 'App\Chapter'])->get();
            $total_comments = $comments->count();
            $output = "";
            if ($total_comments > 0) {
                foreach ($comments as $comment) {
                    $output .= '
                    <div class="py-2">
                    <div class="card">
                    <div class="card-footer"
                    style="padding-top:2px; padding-bottom:2px;padding-left:10px; padding-right:10px;">
                    <small>' . $comment->user->first_name . ' ' . $comment->user->middle_name . '</small>
                    </div>
                    <div class="card-body" style="padding:10px;">
                    <p class="card-text">' . $comment->body . '</p>
                    </div>
                    </div>
                    </div>
                    ';
                }
            } else {
                $output = '
            <p>No comments</p>
            ';
            }
            $data = array(
                'comments' => $output,
                'total_comments' => $total_comments,
            );

            echo json_encode($data);
        }
    }

    // Stores comments for each course chapters using AJAX
    public function ajax_store(Request $request)
    {
        if ($request->ajax()) {
            $current_chapter_id = $request->get('id');
            $rules = array(
                'body' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
                ));
            } else {
                $comment = new Comment();
                $comment->user_id = Auth::id();
                $comment->body = $request->body;
                $comment->commentable_id = $current_chapter_id;
                $comment->commentable_type = 'App\Chapter';
                $comment->save();
                $comments = Comment::where(['commentable_id' => $current_chapter_id, 'commentable_type' => 'App\Chapter'])->get();
                $total_comments = $comments->count();
                $output = '
                        <div class="py-2">
                        <div class="card">
                        <div class="card-footer"
                        style="padding-top:2px; padding-bottom:2px;padding-left:10px; padding-right:10px;">
                        <small>' . $comment->user->first_name . ' ' . $comment->user->middle_name . '</small>
                        </div>
                        <div class="card-body" style="padding:10px;">
                        <p class="card-text">' . $comment->body . '</p>
                        </div>
                        </div>
                        </div>
                        ';

                $data = array(
                    'comment' => $output,
                    'total_comments' => $total_comments,
                );
                
                return response()->json($data);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $comment->update($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Custom methods
    public function store_chapter_comment(Request $request, Chapter $chapter)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->body = $request->body;

        $chapter->comments()->save($comment);

        return back();
    }

    // Store comments with axios
    // public function store_chapter_comment_axios(Request $request, Chapter $chapter) {
    //     $this->validate($request, [
    //         'body'=>'required'
    //     ]);

    //     $comment = new Comment();
    //     $comment->user_id = Auth::id();
    //     $comment->body = $request->get('body');

    //     $chapter->comments()->save($comment);

    //     event(new ChirpAction($id, $action));
    //     return '';
    // }

    // public function actOnChirp(Request $request, $id) {
    //     $action = $request->get('action');
    //     switch ($action) {
    //         case 'Like':
    //             Chapter::where('id', 1)-> increment('chapter_number');
    //             break;

    //         case 'Unlike':
    //             Chapter::where('id', 1)-> decrement('chapter_number');
    //             break;
    //     }
    //     event(new ChapterAction(1, $action));
    //     return '';
    // }
}
