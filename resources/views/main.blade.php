<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="m-auto w-max h-[600px]">
        <div class="flex flex-col gap-3 overflow-y-auto w-[130%] h-[99%] mt-5">
            @foreach ($tasks as $eachtask )
            <div class="flex flex-row items-center justify-between w-[100%] max-w-[250px]">
                <p class="break-words w-[100%]">{{$eachtask['title']}}</p>
                <div class="flex items-center">
                    <button onclick="hanldeedit({{$eachtask}})">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 text-blue-700 " viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                        </svg>
                    </button>
                    <button onclick="handledelete({{$eachtask}})">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
            @endforeach

        </div>
        <form id="form" method="POST" action="/addtask" class="mt-4">
            @csrf
            <div class="flex flex-row justify-center ">
                <input id="inputfield" type="text" placeholder="Add Task" name="title">
                <button class="flex flex-row items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</body>
</html>
<script>
    // let isEdit=false
    function hanldeedit(e) {
        console.log(e)
        const inputfield = document.getElementById('inputfield');
        inputfield.value = e.title

        const form = document.getElementById('form');
        // console.log(form)
        form.method = "POST"
        form.action = `/edit/${e.id}`
        // console.log(form)
        // const newInput=document.createElement('input');
        // newInput.st
    }

    function handledelete(e) {
        // fetch(`http://127.0.0.1:8000/delete/${e.id}`
        //     , method: 'DELETE'
        //     , headers: {
        //         'Content-Type': 'application/json'
        //         , 'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token if needed
        //     },)
        const form = document.getElementById('form');
        // form.method = "DELETE"
        form.action = `/delete/${e.id}`
        form.submit();
        console.log(e);
    }

</script>
