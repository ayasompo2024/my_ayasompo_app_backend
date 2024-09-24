@extends('admin.layout.app')

@section('content')
    <div class=" px-3">
        <h4 class="pt-4">
            Mysql Querys Situation
        </h4>
        <div class="mt-4 card p-3">
            <form action="{{ route('dev.run-mysql-query') }}" method="post" class="mt-2">
                @csrf
                <textarea name="sqlquery" rows="10" class="form-control" placeholder="Enter Query "></textarea>
                <input class="bg-danger mt-2 btn btn-sm" type="submit" value="Run Query">
            </form>
        </div>
    </div>
@endsection
