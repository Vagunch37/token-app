@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tokens
                    <form action="{{ route('token.store') }}" method="POST" style="display: inline">
                        @csrf
                        <button type="submit" class="btn btn-primary float-right">Generate Token</button>
                    </form>
                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tokens</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($tokens as $token)
                          <tr>
                            <th scope="row">{{ $token->id }}</th>
                            <td>{{ $token->token }}</td>
                            <td>
                                <form action="{{ route('token.destroy', $token->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger float-right">Delete</button>
                                </form>                
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
