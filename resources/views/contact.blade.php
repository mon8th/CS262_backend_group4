@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="pagetitle">
  <h1>Contact Us</h1>
</div>
<div class="contact-list mt-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Contact List</h5>
            @if(session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif
            <div class="list-group">
              @foreach($contacts as $contact)
                <div class="list-group-item mb-3 p-3" style="border: 1px solid #ddd; border-radius: 8px;">
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <h6 class="mb-1" style="font-weight: bold;">{{ $contact->name }} <small class="text-muted">({{ $contact->role }})</small></h6>
                      <p class="mb-0"><strong>Subject:</strong> {{ $contact->subject }}</p>
                      <p class="mb-0">{{ $contact->message }}</p>
                      <p class="mb-0"><strong>Email:</strong> <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
                    </div>
                    <div class="ml-3">
                      <form action="{{ route('contact.destroy', $contact->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</button>
                      </form>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
