<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    /* index.blade.php（フォーム入力ページ）を呼び出し */
    public function index(){
        return view('index');
    }
    /* 送信ボタンクリック時に行われる処理 */
    public function confirm(ContactRequest $request){
        /* 値を取り出す */
        $contact = $request->only(['name', 'email', 'tel', 'content']);
        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest  $request){
        $contact = $request->only(['name', 'email', 'tel', 'content']);
        Contact::create($contact);/* create で$contact の変数に格納されたデータを作成 */
        return view('thanks');
    }

}
