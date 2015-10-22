@extends('layouts.default')
@section('content')
    <header class="clearfix">
        <a href="/calendar/{{$m - 1}}"><span class="glyphicon glyphicon-menu-left"></span></a>
        <h1>{{$calendar['month']}}</h1>
        <a href="/calendar/{{$m + 1}}"><span class="glyphicon glyphicon-menu-right"></span></a>
        <nav id="pageNav">
            <ul class="clearfix">
                <li id="user-victor">
                    <img src="/images/victor.png" class="circle" alt="Victor Image">
                <span class="person">
                    <p class="name">VICTOR MARINOV 2</p>
                    <span class="title">BUSINESS INTELIGENCE</span>
                </span>

                    <div class="loader ldr-clr-1">
                        <div class="loader-bg">

                        </div>
                        <div class="spiner-holder-one animate-0-25-a">
                            <div class="spiner-holder-two animate-0-25-b">
                                <div class="loader-spiner" style=""></div>
                            </div>
                        </div>
                        <div class="spiner-holder-one animate-25-50-a">
                            <div class="spiner-holder-two animate-25-50-b">
                                <div class="loader-spiner"></div>
                            </div>
                        </div>
                        <div class="spiner-holder-one animate-50-75-a">
                            <div class="spiner-holder-two animate-50-75-b">
                                <div class="loader-spiner"></div>
                            </div>
                        </div>
                        <div class="spiner-holder-one animate-75-100-a">
                            <div class="spiner-holder-two animate-75-100-b">
                                <div class="loader-spiner"></div>
                            </div>
                        </div>
                    </div>

                </li>

                <li id="user-karamfil">
                    <img src="/images/karamfil.png" class="circle">
            <span class="person">
                <p class="name">KARAMFIL HRISTOV</p>
                <span class="title">GRAPHIC DESIGNER</span>
            </span>

                    <div class="loader ldr-clr-2">
                        <div class="loader-bg">

                        </div>
                        <div class="spiner-holder-one animate-0-25-a">
                            <div class="spiner-holder-two animate-0-25-b">
                                <div class="loader-spiner" style=""></div>
                            </div>
                        </div>
                        <div class="spiner-holder-one animate-25-50-a">
                            <div class="spiner-holder-two animate-25-50-b">
                                <div class="loader-spiner"></div>
                            </div>
                        </div>
                        <div class="spiner-holder-one animate-50-75-a">
                            <div class="spiner-holder-two animate-50-75-b">
                                <div class="loader-spiner"></div>
                            </div>
                        </div>
                        <div class="spiner-holder-one animate-75-100-a">
                            <div class="spiner-holder-two animate-75-100-b">
                                <div class="loader-spiner"></div>
                            </div>
                        </div>
                    </div>
                </li>


                <li id="user-mehmed">
                    <img src="/images/mehmed.png" class="circle">
                <span class="person">
                <p class="name">MEHMED AHMED</p>
                <span class="title">FRONT-END DEVELOPER</span>
                </span>

                    <div class="loader ldr-clr-3">
                        <div class="loader-bg">

                        </div>
                        <div class="spiner-holder-one animate-0-25-a">
                            <div class="spiner-holder-two animate-0-25-b">
                                <div class="loader-spiner" style=""></div>
                            </div>
                        </div>
                        <div class="spiner-holder-one animate-25-50-a">
                            <div class="spiner-holder-two animate-25-50-b">
                                <div class="loader-spiner"></div>
                            </div>
                        </div>
                        <div class="spiner-holder-one animate-50-75-a">
                            <div class="spiner-holder-two animate-50-75-b">
                                <div class="loader-spiner"></div>
                            </div>
                        </div>
                        <div class="spiner-holder-one animate-75-100-a">
                            <div class="spiner-holder-two animate-75-100-b">
                                <div class="loader-spiner"></div>
                            </div>
                        </div>
                    </div>
                </li>

                <li id="user-ivo">
                    <img src="images/ivaylo.png" class="circle">
                <span class="person">
                <p class="name">IVAYLO KOTOV</p>
                <span class="title">BACK-END DEVELOPER</span>
                </span>

                    <div class="loader ldr-clr-4">
                        <div class="loader-bg">

                        </div>
                        <div class="spiner-holder-one animate-0-25-a">
                            <div class="spiner-holder-two animate-0-25-b">
                                <div class="loader-spiner" style=""></div>
                            </div>
                        </div>
                        <div class="spiner-holder-one animate-25-50-a">
                            <div class="spiner-holder-two animate-25-50-b">
                                <div class="loader-spiner"></div>
                            </div>
                        </div>
                        <div class="spiner-holder-one animate-50-75-a">
                            <div class="spiner-holder-two animate-50-75-b">
                                <div class="loader-spiner"></div>
                            </div>
                        </div>
                        <div class="spiner-holder-one animate-75-100-a">
                            <div class="spiner-holder-two animate-75-100-b">
                                <div class="loader-spiner"></div>
                            </div>
                        </div>
                    </div>
                </li>

                <li id="user-angelina">
                <span class="person">
                <img src="/images/angelina.png" class="circle">
                <p class="name">ANGELINA MARKOVA</p>
                <span class="title">FRONT-END INTERN</span>
                <span class="person">

                 <div class="loader ldr-clr-5">
                     <div class="loader-bg">

                     </div>
                     <div class="spiner-holder-one animate-0-25-a">
                         <div class="spiner-holder-two animate-0-25-b">
                             <div class="loader-spiner" style=""></div>
                         </div>
                     </div>
                     <div class="spiner-holder-one animate-25-50-a">
                         <div class="spiner-holder-two animate-25-50-b">
                             <div class="loader-spiner"></div>
                         </div>
                     </div>
                     <div class="spiner-holder-one animate-50-75-a">
                         <div class="spiner-holder-two animate-50-75-b">
                             <div class="loader-spiner"></div>
                         </div>
                     </div>
                     <div class="spiner-holder-one animate-75-100-a">
                         <div class="spiner-holder-two animate-75-100-b">
                             <div class="loader-spiner"></div>
                         </div>
                     </div>
                 </div>
                </li>
            </ul>
        </nav>
    </header>
    <div>
        <table cellpadding="0" cellspacing="0" class="calendar">
            <tr class="calendar-weekdays">
                <td class="calendar-day-np"> </td>
            @foreach($calendar['headings'] as $weekDay)
                    <td class="calendar-day-head">{{$weekDay}}</td>
            @endforeach
            </tr>
            @foreach($calendar['weeks'] as $week)
            <tr class="calendar-row">
                <td class="calendar-img">
                    <div class="small-icons">
                        <div class="cell-row" style="height:20px;"></div>
                        <div class="cell-row">
                            <img  class="img-icon"  src="/images/small_icon_Victor.png">
                        </div>
                        <div class="cell-row ">
                            <img  class="img-icon" src="/images/small_icon_karamfil.png">
                        </div>
                        <div class="cell-row ">
                            <img  class="img-icon"  src="/images/small_icon_Mehmed.png">
                        </div>
                        <div class="cell-row ">
                            <img  class="img-icon"  src="/images/small_icon_ivaylo.png">
                        </div>
                        <div class="cell-row">
                            <img class="img-icon" src="/images/small_icon_Angelina.png">
                        </div>
                    </div>
                </td>
                @for($i = 0; $i < $week['empty']; $i++)
                    <td class="calendar-day-np"> </td>
                @endfor
                @foreach($week['days'] as $day=>$info)
                    <td class="calendar-day">
                        <div class="day-number">{{$day}}</div>
                        <div class="cell-container">
                            @if(is_array($info))
                        @foreach($info as $user=>$tasks)
                                    <div class="cell-row hours">
                                        @if(is_array($tasks))
                                            @foreach($tasks as $task=>$hours)
                                                <div class="hour clr-{{$task}} bar-{{$hours}}"></div>
                                                @endforeach
                                            @endif
                                        </div>

                        @endforeach
                                @endif
                        </div>
                    </td>
                @endforeach
            </tr>
            @endforeach
        </table>
    </div>
    <div class="clearfix">
        <div class="styled-select theme">
            <select id="theme-picker">
                <option value="1" selected>Dark</option>
                <option value="2" >Light</option>
                <option value="3" >Black And White</option>
            </select>
        </div>

        <form method="post" action="/calendar" >
            <div class="styled-select user">
                <select  name="user" required>
                    <option  value="" disabled selected>Select User</option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="styled-select project">
                <select id="project" name="project" required>
                    <option value="" disabled selected>Select project<img</option>
                    @foreach($projects as $project)
                        <option value="{{$project->id}}">{{$project->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="styled-select task">
                <select id="task" name="task" required>
                    <option value="" disabled selected>Select task</option>
                </select>
            </div>

            <input type="number" name="hours" placeholder="Hours" required>
            <input type="text" id="datepicker" name="date" placeholder="Date" class="datepicker" required>
            <input type="submit">
        </form>
    </div>



@stop