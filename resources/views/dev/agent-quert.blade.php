@extends('admin.layout.app')

@section('content')
    <div class=" px-3">
        <h4 class="pt-4">
            Agent Querys Situation
        </h4>
        <div class="mt-4 card p-3">
            <div class="bg-dark p-2 rounded">
                <span style="color:#1b93a7">Recent Query <br>
                {{-- <span class="badge bg-info ml-2">Use</span> </span>  --}}
                <small class="pl-1">
                    {{ $latest_query->query }}
                </small>
            </div>
            <form action="{{ route('dev.run-agent-query') }}" method="post" class="mt-2">
                @csrf
                <textarea name="sqlquery" rows="10" class="form-control" placeholder="Enter Query "></textarea>
                <input class="bg-danger mt-2 btn btn-sm" type="submit" value="Run Query">
            </form>
        </div>
    </div>
@endsection
