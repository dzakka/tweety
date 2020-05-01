<form action="/tweet/create" method="POST" enctype="multipart/form-data">
@csrf
<div class="mb-4 border border-primary rounded-lg">
  <div class="form-group p-4">
    <textarea name="tweet" class="form-control border border-white" placeholder="what's in your mind today?" id="exampleFormControlTextarea1" rows="4"></textarea>
    @error('tweet')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
  </div>
  <div class="input-group mb-3">
  <div class="custom-file">
    <input name="image" type="file" class="custom-file-input" id="inputGroupFile02">
    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">upload a picture</label>
  </div>
</div>
  <div class="d-flex justify-content-between p-2">
  <img class="rounded-circle mr-3 ml-3" src="{{ asset(auth()->user()->picture) }}">
  <button type="submit" class="btn btn-primary btn-lg">Tweet </button>
  </div>
  </div>
</form>
