<footer >
    <div class='bg-gray-300 vw-100'>
        <div class="container py-10 grid grid-cols-1 gap-4 px-5">
            <h1>{{__('Subscribe to our Newsletter')}}</h1>
            <p>{{__('Sign up to receive exclusive news and offers about the latest launches.')}}</p>
            <form action="/e/subscribe" method="POST">
                @csrf
                <div class="flex flex-row justify-center">
                    <input type="email" name="email" class="form-control rounded-full @error('email') is-invalid @enderror" placeholder="example@example.com">
                     @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror  
                    <button type="submit" class="btn btn-primary bg-blue-600 rounded-full">{{__('Subscribe')}}</button>
                </div>
            </form>
        </div>
    </div>  
</footer>