<div class=" h-30 grid grid-cols-1 gap-3 content-center justify-center text-center">
    <h3> {{ __("Project Image")}} </h3>
</div>
@php $project = $project ?? false @endphp
{{-- if the project has an image --}}
@if($project)
    <div class="overflow-hidden">
        <div class=" h-30 py-6 mt-6 grid grid-cols-1 gap-3 content-center justify-center">
            <h6 class="">{{__("Project saved image is the next image")}}</h3>
        </div>
        <img src="{{$_ENV["APP_URL"].'/ImagesOfProjects/'.$project->image}}" class="" alt="Project image">
    </div>
<div class="grid grid-cols-1 gap-3">                            
    <label for="image" class="block  my-4 text-sm font-medium text-gray-900 dark:text-white" >{{__("EditImage")}}</label>
@else
<div class="grid grid-cols-1 gap-3">                            
    <label for="image" class="block  my-4 text-sm font-medium text-gray-900 dark:text-white" >{{__("UpdateImage")}}</label>
@endif 
    <input id="image" name="image" type="file" class="text-sm @error('image') is-invalid @enderror text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" >
        @error('image') <div class="alert alert-danger">{{ $message }}</div> @enderror 
</div>

<div class="" dir="ltr">
    <div class=" h-30 border-t-2 border-gray-300 pt-6 mt-6 grid grid-cols-1 gap-3 content-center justify-center">
        <h3 class="text-center"> Project Details in English </h3>
    </div>
    <div class="grid grid-cols-1 gap-3">
        <label for="nameEn" class="block  my-4 text-sm font-medium text-gray-900 dark:text-white"> Project Name </label>
        <input type="text" id="nameEn" name="nameEn" class="@error('nameEn') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500   p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
        value="{!! $project->nameEn ?? "Project Name" !!}" required>
        @error('nameEn') <div class="alert alert-danger">{{ $message }}</div> @enderror 
        

    </div>
    <div class="grid grid-cols-1 gap-3">
        <label for="headerEn" class="block  my-4 text-sm font-medium text-gray-900 dark:text-white">Project Header</label>
        <input type="text" id="headerEn" name="headerEn" class="@error('headerEn') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
        value="{{ $project->headerEn ?? "Project Header" }}" required>
        @error('headerEn') <div class="alert alert-danger">{{ $message }}</div> @enderror 
        
    </div>
    <div class="grid grid-cols-1 gap-3">
        <label for="descriptionEn" class="block  my-4 text-sm font-medium text-gray-900 dark:text-white">Project Description</label> 
        <textarea id="descriptionEn" name="descriptionEn" rows="4" class=" @error('descriptionEn') is-invalid @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
        >{!! $project->descriptionEn ?? "Project Description" !!}</textarea>
        @error('descriptionEn') <div class="alert alert-danger">{{ $message }}</div> @enderror 
        
    </div>
</div>         
<div class="" dir="rtl">
    <div class="h-30 border-t-2 border-gray-300 pt-6 mt-6 grid grid-cols-1 gap-3 content-center justify-center">
        <h3 class="text-center"> تفاصيل المشروع باللغة العربية </h3>
    </div>
    <div class="grid grid-cols-1 gap-3">
        <label for="nameAr" class="block  my-4 text-sm font-medium text-gray-900 dark:text-white"> 
            اسم المشروع </label>
        <input type="text" id="nameAr" name="nameAr" class="@error('nameAr') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500   p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
            value="{!! $project->nameAr ?? "اسم المشروع" !!}" required>
        @error('nameAr') <div class="alert alert-danger">{{ $message }}</div> @enderror 
            
    </div>
    <div class="grid grid-cols-1 gap-3">
        <label for="headerAr" class="block  my-4 text-sm font-medium text-gray-900 dark:text-white">
            ترويسة المشروع </label>
            <input type="text" id="headerAr" name="headerAr" class="@error('headerAr') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500   p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
            value="{!! $project->headerAr ?? "ترويسة المشروع" !!}" required>
        @error('headerAr') <div class="alert alert-danger">{{ $message }}</div> @enderror 
            
    </div>
    <div class="grid grid-cols-1 gap-3">
        <label for="descriptionAr" class="block  my-4 text-sm font-medium text-gray-900 dark:text-white">
            تفاصيل المشروع </label> 
        <textarea id="descriptionAr" name="descriptionAr" rows="4" class="@error('descriptionAr') is-invalid @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        > {{ $project->descriptionAr ??  "تفاصيل المشروع" }}</textarea>
        @error('descriptionAr') <div class="alert alert-danger">{{ $message }}</div> @enderror         
    </div> 
</div>               