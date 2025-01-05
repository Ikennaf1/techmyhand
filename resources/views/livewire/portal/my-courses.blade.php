<div>
    @foreach ($myCourses as $course)
        <div class="my-courses-each text-sm">
            <div class="flex gap-4 justify-start">
                <div class="w-48 h-48 shadow-xl overflow-hidden">
                    <img class="w-full h-full object-cover object-center" src="https://hips.hearstapps.com/hmg-prod/images/new-years-wishes-famous-quotes-to-use-as-new-year-wishes-673399cd1bdea.jpg" alt="{{$course->title}}">
                </div>
                <div class="flex flex-col gap-4">
                    <div class="font-bold">{{$course->title}}</div>
                    <div>{{$course->description}}</div>
                    <div class="font-bold underline"><a href="http://">Open course</a></div>
                </div>
            </div>
        </div>
    @endforeach
</div>
