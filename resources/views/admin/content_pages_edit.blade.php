<div>
    {{ $errors }}
</div>

<div class="wrapper container-fluid">

    {!! Form::open(['url' => route('pagesEdit', ['page' => $data['data']['id']]), 'class' =>'form-horizontal', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}


    <div class="form-group">
        {!! Form::hidden('id', $data['data']['id']) !!}
        {!! Form::label('name', 'Название', ['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('name', $data['data']['name'], ['class' => 'form-control', 'placeholder' => 'Введите название страницы']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('alias', 'Псевдоним:', ['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::text('alias', $data['data']['alias'], ['class' => 'form-control', 'placeholder' => 'Введите псевдоним страницы']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('text', 'Текст:', ['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::textarea('text', $data['data']['text'], ['id' => 'editor', 'class' => 'form-control', 'placeholder' => 'Введите текст']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('old_images', 'Изображение:', ['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-offset-2 col-xs-10">
            {!! Html::image('assets/img/' . $data['data']['images'], '', ['class' => 'img-circle img-responsive']) !!}
            {!! Form::hidden('old_images', $data['data']['images']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('images', 'Изображение:', ['class' => 'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {!! Form::file('images', ['class' => 'filestyle', 'data-buttonText' => '', 'placeholder' => 'Выберите изображение']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button('Сохранить', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
        </div>
    </div>

    {!! Form::close() !!}

    <script>
        CKEDITOR.replace('editor')
    </script>
</div>
