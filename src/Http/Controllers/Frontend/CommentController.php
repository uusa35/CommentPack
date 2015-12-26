<?php namespace Usama\CommentPack\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Src\Book\Book;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Usama\CommentPack\Model\Comment;
use Usama\CommentPack\Model\CommentChild;

/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 12/22/15
 * Time: 9:00 AM
 */
class CommentController extends Controller
{
    protected $comment;
    protected $child;

    public function __construct(Comment $comments, CommentChild $child)
    {
        $this->comment = $comments;
        $this->child = $child;
    }

    public function getAllCommentsForBook()
    {
        return view('CommentPack::index');
    }

    public function postParentComment()
    {
        $validator = Validator::make(Input::all(),
            [
                'body' => 'required|min:3',
                'book_id' => 'required',
                'user_id' => 'required'
            ]);

        if ($validator->passes()) {

            $commentCreated = $this->comment->create(Input::except('_token'));

            if ($commentCreated) {

                return redirect()->back()->with(['success' => trans('messages.success.created')]);
            }
        }

        return redirect()->back()->with(['error' => trans('messages.error.updated')]);

    }

    public function postChildComment()
    {

        $validator = Validator::make(Input::all(),
            [
                'body' => 'required|min:3',
                'user_id' => 'required',
                'comment_id' => 'required'
            ]);

        if ($validator->passes()) {

            $commentCreated = $this->child->create(Input::except('_token'));

            if ($commentCreated) {

                return redirect()->back()->with(['success' => trans('messages.success.created')]);
            }
        }

        return redirect()->back()->with(['error' => trans('messages.error.updated')]);

    }
}