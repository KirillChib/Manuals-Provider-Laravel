@extends('master')
@section('menu')
    @parent
@endsection
@section('content')
<div class="card mb-4 shadow-sm">
    <div class="card-body">
      <h3 class="card-title">{{ $manual->manualName }}</h3>
      <p class="card-text text-muted mb-4">{{ $manual->description }}</p>
      
      <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
            @if(Auth::check())
            <a href="{{ $manual->filePath }}" class="btn btn-sm btn-outline-primary" download>
                <i class="bi bi-download me-2"></i>Download
              </a>
              <a href="{{ url('claim/create') }}" class="btn btn-sm btn-outline-primary">
                <i class="bi me-2"></i>New Claim
              </a>
            @endif
        </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="card mt-4">
        <div class="card-body">
            <p style="color:black;">{{ $contentText }}</p>
        </div>
    </div>
@endsection