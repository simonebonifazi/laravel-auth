<form action="{{ route('admin.posts.store') }}" method="POST">
    @csrf

    <div class="row">

        <!-- titolo -->
        <div class="mb-3 col-12">
            <label for="title" class="form-label">Titolo </label>
            <input class="form-control  @error('title') is-invalid @enderror" type="text" id="title" name="title"
                placeholder="inserisci qui il titolo del tuo nuovo post..." value=" {{ old('title', $post->title)  }} "
                maxlenght="50">
        </div>
        <!-- content -->
        <div class="mb-3 col-12">
            <label for="content" class="form-label"> Contenuto </label>
            <textarea class="form-control" id="content" name="content"> {{ old('content', $post->content) }} </textarea>
        </div>
        <!-- image -->
        <div class="mb-3 col-10">
            <label for="image" class="form-label">Immagine </label>
            <input class="form-control @error('image') is-invalid @enderror" type="url" id="image" name="image"
                placeholder="Url del post..." value=" {{ old('image', $post->image) }}">
        </div>
        <div class="mb-3 col-2">
            <img class="img-fluid"
                src="{{ $post->image ?? https://image.shutterstock.com/image-vector/ui-image-placeholder-wireframes-apps-260nw-1037719204.jpg}}"
                alt="preview" id="preview">
            <!-- to fix w/js -->
        </div>
    </div>





    <footer class="d-flex justify-content-between align items-center">
        <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary">
            <i class="fa-solid fa-circle-left"> </i> Indietro ...
        </a>

        <button type="submit" class="btn btn-outline-success">
            <i class="fa-solid fa-floppy-disk"></i> Salva!
        </button>
    </footer>
</form>