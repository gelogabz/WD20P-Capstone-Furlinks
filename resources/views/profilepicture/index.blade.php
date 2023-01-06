


<form action="{{route('image.store')}}" method="post" enctype="multipart/form-data">
    @csrf
<label for="">Add Image</label>
<input type="file" name="image" id="image">
<input type="submit" class="btn btn-primary form-control" value="Change">

</form>

