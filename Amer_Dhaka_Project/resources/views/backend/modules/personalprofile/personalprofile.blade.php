@extends('backend.layouts.master')
@section('page_title', 'Profile')
@section('page_sub_title', 'Profile Update')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0"> Profile Update</h4>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {!! Form::model($personalprofile,['method' => 'post', 'route' => 'personalprofile.store']) !!}
                
                    {!! Form::label('phone', 'Phone', ['class'=>'w-100']) !!}
                    {!! Form::text('phone', null, ['class'=>'form-control']) !!}
                    {!! Form::label('address', 'Address', ['class'=>'w-100 mt-3']) !!}
                    {!! Form::text('address', null, ['class'=>'form-control']) !!}
                  <div class="row mt-3">
                    <div class="col-md-4">
                        {!! Form::label('division_id', 'Select Division', ['class'=>'w-100']) !!}
                        {!! Form::select('division_id', $divisions, null, ['id'=>'division_id','class'=>'form-select', 'placeholder'=>'Select Division']) !!}
                    </div>
                    <div class="col-md-4">
                    {!! Form::label('district_id', 'Select District', ['class'=>'w-100']) !!}
                    <select id="district_id" class="form-select" name="district_id" disabled>
                        <option>Select District</option>
                    </select>
                </div>
                    <div class="col-md-4">
                        {!! Form::label('thana_id', 'Select Thana', ['class'=>'w-100']) !!}
                    <select id="thana_id" class="form-select" name="thana_id" disabled>
                        <option>Select Thana</option>
                    </select>
                    </div>
                    
                </div>
                    {!! Form::label('gender', 'Select Gender', ['class'=>'w-100 mt-3']) !!}
                    <div class="d-flex">
                        <div class="d-flex me-4">{!! Form::radio('gender', 'Male', false, ['class'=>'form-check me-1']) !!} Male </div>
                        <div class="d-flex me-4">{!! Form::radio('gender', 'Female', false, ['class'=>'form-check me-1']) !!} Female </div>
                        <div class="d-flex"> {!! Form::radio('gender', 'Others', false, ['class'=>'form-check me-1']) !!} Others </div>
                    </div>
                    
                   
                    
                {!! Form::button('Update Profile', ['type' => 'submit', 'class' => 'btn btn-success mt-2']) !!}
                {!! Form::close() !!}
            </div>
        </div>
   
        
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Profile Photo</h4>
            </div>
            <div class="card-body">
                <lebel> Upload Profile Photo </label>
                <input type="file" class="form-control mt-3" id="image_input">
                <p id="error_message" class="text-danger"></p>
                <button class="btn btn-success my-3" id="image_upload_button">Upload</button>
                <img class="img-thumbnail" id="image_preview"/>
            </div>
        </div>
    </div>
</div>
 
@php 
if ($personalprofile){
    $personalprofile_exists = 1;
}
else{
    $personalprofile_exists = 0;
}
@endphp

@endsection



@push('js')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> <!-- Ensure axios is loaded -->



<script>
    

let photo 
$('#image_input').on('change', function(e){
    let file = e.target.files[0]
    let reader = new FileReader()
    reader.onloadend = () => {
        photo = reader.result
          $('#image_preview').attr('src', photo)
    }

    reader.readAsDataURL(file)

})
$('#image_upload_button').on('click', function(){
    if(photo != undefined){
        $('#error_message').text('')
        axios.post(`${window.location.origin}/dashboard/upload-photo`,{photo:photo} ).then(res=>{
            console.log(res.data)
        })
    }
    else{
        $('#error_message').text('Please select a photo')
    }
})

        const getDistricts = (division_id, selected = null) => {
            axios.get(`${window.location.origin}/get-districts/${division_id}`).then(res => {
                let districts = res.data
                let element = $('#district_id')
                let thana_element=$('#thana_id').empty().append(`<option>Select Thana</option>`).attr('disabled','disabled')
                element.removeAttr('disabled')
                element.empty();
                element.append(`<option>Select District</option>`)

                districts.map((district, index) => {
                        element.append(`<option value="${district.id}" ${selected==district.id ? 'selected': ''}>${district.name}</option>`);
                });
            })
                
            
        }

         const getThanas = (district_id, selected = null) => {
            axios.get(`${window.location.origin}/get-thanas/${district_id}`).then(res => {
                let thanas = res.data
                let element = $('#thana_id')
                element.removeAttr('disabled')
                element.empty();
                element.append(`<option>Select Thana</option>`)

                thanas.map((thana, index) => {
                    element.append(`<option value="${thana.id}" ${selected==thana.id ? 'selected':''}>${thana.name}</option>`);
                });
            })
                
            
        }

        $('#division_id').on('change', function () {
           
                getDistricts($(this).val())    

    })

    $('#district_id').on('change',function (){
        getThanas($(this).val())
    })

     if ('{{ $personalprofile_exists}}' == 1){
         getDistricts('{{ $personalprofile?->division_id }}','{{$personalprofile?->district_id }}')  
         getThanas('{{ $personalprofile?->district_id }}','{{ $personalprofile?->thana_id }}')   
 }
</script>
@endpush
