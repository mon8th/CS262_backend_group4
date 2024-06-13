@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="pagetitle">
  <h1>Contact</h1>
</div>
<section class="section">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Contact Us</h5>
      <form action="{{ route('contact.submit') }}" method="POST">
        @csrf
        <div class="row mb-3">
          <label for="name" class="col-md-4 col-lg-3 col-form-label">Name</label>
          <div class="col-md-8 col-lg-9">
            <input type="text" name="name" class="form-control" id="name" required>
          </div>
        </div>
        <div class="row mb-3">
          <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
          <div class="col-md-8 col-lg-9">
            <input type="email" name="email" class="form-control" id="email" required>
          </div>
        </div>
        <div class="row mb-3">
          <label for="subject" class="col-md-4 col-lg-3 col-form-label">Subject</label>
          <div class="col-md-8 col-lg-9">
            <input type="text" name="subject" class="form-control" id="subject" required>
          </div>
        </div>
        <div class="row mb-3">
          <label for="message" class="col-md-4 col-lg-3 col-form-label">Message</label>
          <div class="col-md-8 col-lg-9">
            <textarea name="message" class="form-control" id="message" rows="5" required></textarea>
          </div>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Send Message</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
