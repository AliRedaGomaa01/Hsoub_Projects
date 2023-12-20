
            @csrf
            {{-- @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif  --}}
            <div class="form-group">
                <label for="title">عنوان المقالة</label>    
                <input type="text" name="title" id="title" class="form-control" value="{{$post->title ?? ""}}">
            </div>
             @error('title')  
             <div class="alert alert-danger">{{$message}}</div>
             @enderror
            <div class="form-group">
                <label for="body">نص المقالة</label>    
                <textarea name="body" id="body" cols="30" rows="10" class="form-control" >{{$post->body ?? ""}}</textarea>
            </div>    
            @error('body')  
             <div class="alert alert-danger">{{$message}}</div>
             @enderror
            <div class="form-group">
                <label for="author">كاتب المقالة</label>    
                <input type="text" name="author" id="author" class="form-control" value="{{$post->author ?? ""}}">
            </div>
            @error('author')  
             <div class="alert alert-danger">{{$message}}</div>
             @enderror
            