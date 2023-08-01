@extends('layouts.auth')

@section('title', "Custom-Order")


@section('content')
    
    <!-- <link href="{{ asset('assets/css/t_style.css') }}" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/t_style.css') }}">
    
  <form action="{{ route('tshirt.store') }}" method="POST" enctype ="multipart/form-data">
  @csrf
  <div class="slide-form justify-content-center">
    <div class="slide-box">
      <div class="fieldset-container">
        <fieldset>
          <h2 class="fs-title text-center">Choose your preferred t-shirt type</h2>
          <div class="tshirt-type-options d-flex justify-content-around mt-4">
                                    <div class="tshirt-type-option" data-value="basict">
                                        <img src="{{ asset('uploads/tshirt/basict.png') }}" alt="Basic T-Shirt">
                                    </div>
                                    <div class="tshirt-type-option" data-value="polot">
                                        <img src="{{ asset('uploads/tshirt/polot.png') }}" alt="Polo T-Shirt">
                                    </div>
                                    <div class="tshirt-type-option" data-value="dropt">
                                        <img src="{{ asset('uploads/tshirt/dropt.png') }}" alt="Drop Shoulder">
                                    </div>
                                    <div class="tshirt-type-option" data-value="jerseyt">
                                        <img src="{{ asset('uploads/tshirt/jerseyt.png') }}" alt="Jersey">
                                    </div>
                                </div>
                                <input type="hidden" name="tshirt_type" id="tshirt_type" value="">


          <select name="tshirt_length" id="tshirt_length">
            <option value="" selected disabled>Select your preferred length</option>
            <option value="full">Full Sleeve</option>
            <option value="half">Half Sleeve</option>
          </select>

          

          <div class="color-options pt-2 pb-1">
              <label for="color">Choose a color:</label>
              <select name="color" id="color">
                  <option value="" selected disabled>Select a color</option>
                  @foreach ($productColors as $productColor)
                      <option value="{{ $productColor->color->name }}" style = "background-color: {{ $productColor->color->code }}">{{ $productColor->color->name }}</option>
                  @endforeach
              </select>
          </div>
          <div class="checkbox-list">
            <p>Choose your preferred position of the print: (Can choose multiple)</p>
            <label for="front">
              <input type="checkbox" name="print_position[]" id="front" value="Front">
              Front
            </label>
            <label for="back">
              <input type="checkbox" name="print_position[]" id="back" value="Back">
              Back
            </label>
            <label for="chest">
              <input type="checkbox" name="print_position[]" id="chest" value="Chest">
              Chest
            </label>
            <label for="shoulder">
              <input type="checkbox" name="print_position[]" id="shoulder" value="Shoulder">
              Shoulder
            </label>
          </div>
        </fieldset>
      </div>
      <a href="#" class="next align-center">Next</a>
    </div>

    <div class="slide-box slided">
      <div class="wrapper">
        <div class="box">
          <div class="js--image-preview"></div>
          <div class="upload-options">
            <label>
              <h4>Upload your choice of print here:</h4>
              <input type="file" class="image-upload"  name="image" class="form-control">
            </label>
          </div>
        </div>
        <div class="preview-box">
          <h4>Image Preview:</h4>
          <div class="image-preview"></div>
        </div>
        <div class="text-input">
          <h4>Enter your text:</h4>
          <input type="text" id="user-text" placeholder="Enter your text here" name="user_text">
        </div>
      </div>
      <a href="#" class="back">Back</a>
      <button type="submit" class="submit">Submit</button>
    </div>
  </div>
  
  </form>



    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/t_work.js') }}"></script>
    
@endsection
