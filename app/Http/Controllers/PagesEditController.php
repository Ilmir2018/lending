<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagesEditController extends Controller
{

    public function index(Page $page)
    {
        $old = $page->toArray();

        if (view()->exists('admin.pages_edit')) {

            $data = [
                'title' => 'Редактрование страницы - ' . $old['name'],
                'data' => $old
            ];

            return view('admin.pages_edit', ['data' => $data]);
        }
        abort(404);
    }

    public function add(Page $page, Request $request)
    {
        if ($request->isMethod('post')) {

            $input = $request->except('_token');

            $validator = Validator::make($input, [
                'name' => 'required|max:255',
                'alias' => 'required|max:255|unique:pages,alias,' . $input['id'],
                'text' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->route('pagesEdit', ['page' => $input['id']])
                    ->withErrors($validator);
            }

            if ($request->hasFile('images')) {
                $file = $request->file('images');
                $file->move(public_path(). '/assets/img', $file->getClientOriginalName());
                $input['images'] = $file->getClientOriginalName();
            } else {
                $input['images'] = $input['old_images'];
            }

            unset($input['old_images']);

            //Заполняем поля таблицы
            $page->fill($input);

            //обновляем данные
            if ($page->update()) {
                return redirect('admin')->with('status', 'Страница обновлена');
            }

        }
    }

    public function delete(Page $page, Request $request)
    {
        if ($request->isMethod('delete')) {
            $page->delete();
            return redirect('admin')->with('status', 'Страница удалена');
        }
    }

}
