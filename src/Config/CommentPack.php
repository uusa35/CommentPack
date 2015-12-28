<?php
/**
 * Created by PhpStorm.
 * User: usamaahmed
 * Date: 12/22/15
 * Time: 9:54 AM
 */

return [
    'model' => 'Usama\CommentPack\Model\Comment',
    'childModel' => 'Usama\CommentPack\Model\CommentChild',
    'controller' => 'Usama\CommentPack\Controllers\CommentController',
    'postParentComment' => 'Usama\CommentPack\Controllers\CommentController@postParentComment',
    'postChildComment' => 'Usama\CommentPack\Controllers\CommentController@postChildComment',
    'deleteChildComment' => 'Usama\CommentPack\Controllers\CommentController@deleteChildComment',
    'deleteParentComment' => 'Usama\CommentPack\Controllers\CommentController@deleteParentComment',
    'postParentCommentRoute' => 'postParentComment',
    'postChildCommentRoute' => 'postChildComment',
    'deleteChildCommentRoute' => 'deleteChildComment',
    'deleteParentCommentRoute' => 'deleteParentComment',
];