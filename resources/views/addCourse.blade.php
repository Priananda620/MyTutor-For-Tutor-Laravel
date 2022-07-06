@extends('layout')
@section('addCourse')
    <div id="overlay-outter" class="d-flex position-fixed align-items-start">
        <div id="overlay-wrapper">

            <div id="xmark-button">
                <button class="float-end"><i class="fa-solid fa-xmark"></i></button>
            </div>


            <div id="addCourse-body">
                <h2>Add Course</h2>
                <form method="POST" enctype="multipart/form-data" class="d-flex flex-column"
                    action="{{ url('/doAddCourse') }}">

                    {{ csrf_field() }}

                    <label for="title">title&nbsp;<span style="color: red;">*&nbsp;&nbsp;</span></label>
                    @error('title')
                        <div class="form_message"><strong>{{ $message }}</strong></div>
                    @enderror
                    <input value="{{ !empty(old('title')) ? old('title') : '' }}" type="text" name="title" class="form-input" required="" autocomplete="off">


                    <label for="description">description<span style="color: red;">&nbsp;*&nbsp;&nbsp;&nbsp;</span></label>
                    @error('description')
                        <div class="form_message"><strong>{{ $message }}</strong></div>
                    @enderror
                    <textarea autocomplete="off" name="description" class="form-input" required="" rows="6" cols="50">{{ !empty(old('description')) ? old('description') : '' }}</textarea>




                    <label for="price">price&nbsp;<span style="color: red;">*&nbsp;&nbsp;</span></label>
                    @error('price')
                        <div class="form_message"><strong>{{ $message }}</strong></div>
                    @enderror
                    <input value="{{ !empty(old('price')) ? old('price') : '' }}" type="text" name="price" class="form-input" required="" autocomplete="off">


                    <label for="learning_hours">learning hours&nbsp;<span style="color: red;">*&nbsp;&nbsp;</span></label>
                    @error('learning_hours')
                        <div class="form_message"><strong>{{ $message }}</strong></div>
                    @enderror
                    <input value="{{ !empty(old('learning_hours')) ? old('learning_hours') : '' }}" type="text" name="learning_hours" class="form-input" required="" autocomplete="off">



                    @if (session('status') == 'ok')
                        <p class="mt-4" style="color: var(--success-font)">
                            {{ session('msg') }}</p>
                    @elseif (session('status') == 'fail' or $errors->any())
                        <p style="color: var(--fail-font)" class="mt-4">
                            {{ session('msg') ? session('msg') : 'Inputs need to pass validation' }}&nbsp;<i
                                class="fas fa-times-circle"></i>
                        </p>
                    @endif

                    <div class="d-inline-flex align-items-center justify-content-between mt-4">
                        <button class="button me-2" style="width: 50%;">Add Course&nbsp;&nbsp;<div class="fa-2x"><i
                                    class="fas fa-circle-notch fa-spin"></i></div></button>
                        <button class="button clear-input-action" style="width: 50%; background: var(--red-accent)">Clear
                            Inputs</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
@endsection

@section('content')

<section id="tutor-main" class="d-flex flex-column align-items-center justify-content-center">
    <svg width="722" height="320" fill="none" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <linearGradient id="illustration-01" x1="-4.14" y1="43.12" x2="303.145" y2="391.913"
                gradientUnits="userSpaceOnUse">
                <stop stop-color="#5D5DFF" stop-opacity=".01"></stop>
                <stop offset=".538" stop-color="#5D5DFF" stop-opacity=".32"></stop>
                <stop offset="1" stop-color="#5D5DFF" stop-opacity=".01"></stop>
            </linearGradient>
        </defs>
        <path
            d="M292.512 0h-2.485c4.1 5.637 8.143 10.76 12.185 15.446 9.096 10.552 19.043 19.174 29.583 25.644l1.077.653c10.95 6.545 23.653 11.451 37.755 14.581 10.83 2.404 22.918 4.156 36.801 5.33 1.983.167 4.003.323 6.061.467l8.683.586 13.802.908c7.255.481 14.609.992 21.813 1.59 15.862 1.32 29.664 3.387 42.19 6.323 12.94 3.037 25.656 7.543 37.793 13.392 10.864 5.262 21.212 11.088 33.257 18.156l4.89 2.881 8.261 4.882 8.936 5.294c4.433 2.63 8.802 5.225 13.05 7.75l111.75 66.854-.302 17.311-119.133-71.27-8.026-4.755c-5.739-3.402-11.479-6.804-17.226-10.201l-8.627-5.093-2.22-1.304c-9.734-5.702-20.902-12.052-32.624-17.476-12.24-5.606-25.329-9.783-38.902-12.416-12.707-2.466-26.845-4.136-43.222-5.103-5.134-.304-10.349-.577-15.499-.837l-12.699-.634c-5.501-.278-11.071-.572-16.549-.903-16.278-.983-30.242-2.79-42.691-5.52-13.922-3.054-26.434-7.865-37.189-14.297l-.216-.13c-10.674-6.415-20.743-15.096-29.926-25.804-7.789-9.08-15.45-19.67-23.372-32.305h-2.375c8.231 13.22 16.162 24.228 24.215 33.613 9.087 10.589 19.033 19.232 29.585 25.71l1.05.638c10.95 6.546 23.663 11.436 37.786 14.533 12.543 2.753 26.61 4.574 43 5.565 6.569.396 13.266.739 19.819 1.066l9.412.47c5.157.26 10.38.533 15.519.837 16.294.964 30.346 2.622 42.959 5.07 13.438 2.609 26.375 6.737 38.446 12.27 11.344 5.25 22.063 11.267 34.668 18.686 11.234 6.623 22.437 13.273 33.62 19.911l.134.079L717.605 210.4l-.118 6.611-9.378 5.2-118.373-70.814-5.613-3.333c-6.164-3.66-12.333-7.322-18.511-10.98l-9.728-5.749c-10.269-6.053-22.289-12.98-34.985-18.587-12.052-5.285-25.318-9.17-39.43-11.549-12.67-2.137-26.94-3.58-43.621-4.412a2849 2849 0 00-9.384-.446l-12.33-.569c-7.68-.36-15.464-.752-23.091-1.24-16.073-1.029-29.986-2.919-42.533-5.775-13.463-3.07-25.643-7.76-36.221-13.946l-1.1-.652c-10.681-6.42-20.782-15.045-30.025-25.638-8.423-9.651-16.628-20.952-25.086-34.547-2.86-4.598-5.712-9.285-8.535-13.974h-2.353c3.03 5.04 6.097 10.089 9.174 15.034 8.522 13.69 16.789 25.075 25.276 34.805 9.117 10.456 19.078 19.029 29.623 25.503l1.107.67c10.957 6.551 23.633 11.496 37.678 14.698 12.632 2.88 26.648 4.784 42.85 5.822 7.628.488 15.41.88 23.084 1.24l8.893.411c4.29.197 8.577.395 12.857.607l2.743.143c15.419.84 28.74 2.232 40.645 4.241 13.952 2.352 27.06 6.192 38.957 11.41 11.732 5.179 22.905 11.511 32.637 17.221l2.138 1.258a8484.147 8484.147 0 0118.821 11.139l15.013 8.911 117.373 70.217-15.197 8.425-109.893-65.739a12699.359 12699.359 0 00-33.842-20.079l-2.513-1.48c-10.108-5.938-20.911-12.023-32.56-16.979-11.955-5.048-25.326-8.759-39.741-11.026-12.693-1.997-26.58-3.346-43.705-4.248l-14.663-.763c-9.945-.525-20.054-1.099-29.906-1.866-15.822-1.231-29.613-3.321-42.162-6.387-13.681-3.341-26.103-8.316-36.925-14.783l-.238-.142c-10.726-6.447-20.889-14.965-30.212-25.321-8.603-9.56-16.927-20.658-25.447-33.931-6.08-9.475-12.083-19.349-17.921-29.011h-2.336c1.509 2.496 3.032 5.009 4.56 7.525 2.933 4.83 5.897 9.678 8.894 14.474.465.745.933 1.48 1.401 2.217.278.438.556.875.833 1.315l1.922 3.046.968 1.52c8.573 13.361 16.963 24.544 25.646 34.19 9.188 10.206 19.186 18.655 29.736 25.131l1.174.712c10.991 6.569 23.6 11.619 37.474 15.009 12.661 3.092 26.556 5.198 42.483 6.437 9.865.768 19.977 1.343 29.925 1.868l14.695.766c17.014.891 30.836 2.234 43.498 4.225 14.254 2.242 27.468 5.907 39.272 10.892 12.491 5.314 24.059 11.973 34.838 18.339 11.306 6.68 22.581 13.381 33.836 20.076l108.895 65.144-15.191 8.432-135.199-80.881-3.428-1.983c-9.651-5.569-20.371-11.579-31.743-16.306-11.852-4.927-25.245-8.594-39.809-10.901l-1.755-.272c-11.757-1.794-24.735-3.133-40.57-4.187l-9.563-.627c-11.892-.788-24.004-1.646-35.753-2.81-15.522-1.538-29.148-3.901-41.66-7.223-13.481-3.58-25.829-8.692-36.702-15.191l-.258-.155c-10.768-6.471-21.01-14.855-30.446-24.92-8.819-9.41-17.308-20.236-25.953-33.101-6.81-10.136-13.402-20.596-19.809-30.87l-3.821-6.139A784.13 784.13 0 00213.574 0h-2.377a797.304 797.304 0 014.292 6.818l3.839 6.166c6.435 10.32 13.049 20.813 19.831 30.9 8.707 12.96 17.262 23.87 26.152 33.353 9.273 9.894 19.32 18.185 29.882 24.665l1.256.761c11.03 6.594 23.55 11.777 37.214 15.406 12.614 3.351 26.344 5.732 41.976 7.281 12.999 1.288 26.422 2.201 39.508 3.059l4.682.305 3.533.238c15.49 1.079 28.215 2.449 39.802 4.28 14.392 2.276 27.633 5.899 39.354 10.771 12.615 5.243 24.474 12.113 34.925 18.167l.004.002 134.169 80.265-15.194 8.418-126.705-75.799-3.424-1.993c-9.642-5.598-20.351-11.637-31.706-16.377-11.784-4.92-25.128-8.664-39.66-11.129l-1.632-.273c-11.217-1.848-23.778-3.36-39.208-4.72l-2.278-.198c-5.128-.438-10.212-.88-15.25-1.341l-2.682-.248c-2.236-.209-4.461-.424-6.679-.644a922.679 922.679 0 01-9.956-1.044 621.162 621.162 0 01-4.88-.56l-4.086-.492c-15.234-1.908-28.673-4.582-41.088-8.177-13.282-3.846-25.55-9.105-36.465-15.627-10.916-6.535-21.343-14.825-30.979-24.662-9.015-9.203-17.69-19.72-26.52-32.151a645.536 645.536 0 01-3.61-5.142c-5.904-8.495-11.711-17.27-17.283-25.798l-4.663-7.147c-4.16-6.357-8.022-12.084-11.691-17.333h-2.443c4.089 5.816 8.415 12.229 13.13 19.453l3.563 5.466c5.831 8.932 11.941 18.178 18.228 27.198 1.046 1.5 2.093 2.99 3.144 4.468 8.888 12.517 17.629 23.112 26.722 32.393 9.373 9.567 19.481 17.695 30.065 24.181l1.317.797c11.061 6.612 23.487 11.938 36.933 15.832 12.515 3.624 26.057 6.32 41.397 8.24l1.647.192a658.952 658.952 0 0011.469 1.303c1.956.208 3.919.409 5.89.604l3.27.32 4.723.446 1.443.133c3.766.343 7.545.681 11.352 1.012l6.086.526c16.116 1.42 29.094 3.007 40.683 4.973 14.384 2.439 27.58 6.14 39.227 11.002 12.623 5.268 24.453 12.169 34.883 18.253l.003.002 125.701 75.197-15.191 8.422-118.241-70.735-4.584-2.679c-9.331-5.431-19.619-11.216-30.431-15.858-11.836-5.081-24.695-8.904-39.315-11.688l-1.55-.292c-11.408-2.121-23.837-3.9-39.899-5.712l-5.712-.642c-11.977-1.355-25.348-2.954-38.236-4.945-14.942-2.308-28.187-5.309-40.496-9.175-13.07-4.103-25.259-9.506-36.226-16.063l-.274-.164-1.352-.84-.226-.139c-.759-.466-1.517-.932-2.272-1.416-7.736-4.973-15.239-10.75-22.381-17.235a45.03 45.03 0 00-.466-.418 45.818 45.818 0 01-.619-.558l-.245-.232a184.96 184.96 0 01-3.418-3.247c-9.21-8.984-18.082-19.176-27.125-31.162l-1.507-2.007c-7.269-9.72-14.35-19.8-22.529-31.663l-2.095-3.036C191.451 18.119 184.439 8.547 177.667 0h-2.657l.351.44c6.939 8.712 14.099 18.463 22.92 31.212l4.604 6.67c7.71 11.14 14.515 20.748 21.574 30.104 9.105 12.066 18.043 22.332 27.324 31.388a182.785 182.785 0 006.033 5.607c.197.175.393.352.589.53.294.266.588.532.886.791l.924.784c6.103 5.256 12.444 10.01 18.967 14.195a154.57 154.57 0 002.946 1.835l.107.065 1.171.728c11.104 6.637 23.436 12.104 36.656 16.252 12.403 3.897 25.745 6.921 40.788 9.244 11.799 1.824 23.991 3.318 35.153 4.597l9.965 1.126c16.237 1.849 28.714 3.668 40.21 5.857 14.466 2.752 27.19 6.533 38.9 11.561 12.537 5.383 24.361 12.314 34.787 18.427l117.21 70.118-15.191 8.421L512.24 204.3l-3.584-2.109c-10.661-6.26-20.553-11.929-31.029-17.158a246.546 246.546 0 00-39.045-12.038l-1.519-.33c-10.674-2.296-22.3-4.33-37.111-6.49l-8.817-1.268c-11.414-1.652-24.095-3.579-36.516-5.887-14.656-2.725-27.709-6.054-39.904-10.176-12.886-4.357-24.999-9.899-36.003-16.476l-.252-.152c-.387-.233-.773-.475-1.159-.716l-.612-.381-1.432-.881a77.05 77.05 0 01-.713-.449 185.943 185.943 0 01-17.595-12.766l-2.244-1.846a43.697 43.697 0 01-.657-.567c-.152-.133-.304-.266-.458-.398a196.7 196.7 0 01-6.393-5.701c-9.373-8.753-18.441-18.622-27.72-30.171-8.247-10.263-16.376-21.13-23.997-31.474l-1.625-2.207c-10.181-13.846-18.17-24.081-25.906-33.187A247.583 247.583 0 00157.567 0h-2.792c4.039 4.13 7.93 8.395 11.652 12.773l1.479 1.75c6.919 8.238 14.145 17.51 23.055 29.582l1.284 1.744c8.079 10.986 16.779 22.68 25.673 33.749 9.322 11.602 18.452 21.539 27.917 30.379 9.896 9.246 20.49 17.285 31.493 23.898l.36.215c11.126 6.65 23.368 12.253 36.39 16.654 12.285 4.153 25.427 7.505 40.177 10.246 12.72 2.362 25.519 4.317 40.669 6.488l1.523.217c17.103 2.446 29.966 4.684 41.708 7.257a244.644 244.644 0 0138.692 11.929c11.568 5.779 22.862 12.355 34.371 19.142l108.742 65.054-15.19 8.421-101.26-60.575-3.468-2.05a1552.578 1552.578 0 00-6.779-3.978l-2.69-1.566-1.575-.908-2.67-1.532c-5.735-3.273-11.4-6.398-17.219-9.413l-.066-.032c-12.547-5.416-25.459-9.837-38.379-13.139l-2.233-.563c-10.238-2.551-21.443-4.901-35.655-7.477l-9.452-1.694c-1.537-.277-3.051-.552-4.545-.825l-3.732-.687-2.514-.469-3.59-.676-1.796-.344-3.274-.636-1.95-.384-3.295-.658-1.788-.366-3.524-.728c-.949-.199-1.894-.405-2.84-.608l-.591-.126c-.539-.115-1.078-.229-1.615-.347-14.382-3.144-27.244-6.797-39.322-11.163a218.82 218.82 0 01-9.406-3.645c-9.169-3.803-17.92-8.182-26.125-13.066l-.279-.162c-9.917-5.981-19.604-12.98-28.777-20.894l-1.144-.994-.654-.57c-.389-.338-.778-.676-1.163-1.02-9.55-8.551-18.812-18.102-28.316-29.201-8.47-9.886-16.85-20.337-24.714-30.283l-3.029-3.833c-9.828-12.4-17.695-21.758-25.346-30.158-7.939-8.71-16.62-17.003-25.89-24.728h-3.138c9.865 8.07 19.126 16.835 27.547 26.073l1.013 1.116c7.109 7.86 14.507 16.678 23.615 28.146l5.354 6.767c7.38 9.31 15.181 18.996 23.065 28.2 9.568 11.168 18.891 20.782 28.501 29.389.324.29.652.575.98.86l.6.522.579.51c.552.486 1.104.973 1.662 1.45l.286.24c8.422 7.173 17.248 13.598 26.321 19.144l1.441.872.463.272c8.276 4.93 17.114 9.352 26.381 13.194a220.411 220.411 0 009.496 3.683c12.134 4.391 25.079 8.065 39.575 11.235l1.099.236 3.958.844 1.705.353c1.208.251 2.418.502 3.637.749l3.247.648 2.677.527 3.178.614 3.25.617 2.998.563 4.977.917 5.067.919 8.782 1.575c15.209 2.756 26.956 5.251 37.752 8.01 12.776 3.264 25.577 7.645 38.047 13.024l1.904 1 .789.414c.531.278 1.063.557 1.591.839l1.105.598c1.069.574 2.137 1.148 3.2 1.73l1.089.604.006.003c1.053.581 2.107 1.162 3.159 1.751l1.608.91c.877.493 1.753.986 2.628 1.485l3.042 1.748 2.079 1.202c4.012 2.329 8.022 4.698 12.057 7.091l100.266 59.981-15.19 8.422-92.779-55.501c-10.863-6.503-22.453-13.383-34.263-19.76-11.843-5.511-24.426-10.458-37.446-14.719-12.293-3.312-25.504-6.48-40.387-9.682l-4.924-1.062c-11.569-2.504-23.679-5.197-35.642-8.211-14.103-3.551-26.783-7.514-38.762-12.117-12.569-4.829-24.546-10.625-35.596-17.23-11.007-6.555-21.797-14.378-31.99-23.144-9.691-8.335-19.142-17.58-28.897-28.263-8.313-9.103-16.341-18.416-23.934-27.33l-5.251-6.169c-9.047-10.589-17.348-19.903-25.346-28.435-9.762-9.395-19.915-18.108-30.223-25.931-5.842-3.907-11.708-7.64-17.952-11.493h-3.842c7.293 4.462 13.996 8.696 20.624 13.13 10.231 7.766 20.324 16.427 29.962 25.706l1.775 1.9c7.715 8.294 15.754 17.361 24.482 27.613l5.88 6.91c7.932 9.29 15.017 17.432 22.341 25.455 9.833 10.764 19.341 20.065 29.07 28.432a240.266 240.266 0 0015.696 12.406c.753.545 1.51 1.077 2.268 1.61l.378.266 1.303.923c.887.614 1.779 1.213 2.671 1.811l.142.095 1.279.865.93.603.931.6.407.263c.673.437 1.347.873 2.024 1.299l.436.268c1.113.698 2.228 1.391 3.349 2.065l.453.271c11.169 6.669 23.249 12.517 35.904 17.38 12.032 4.626 24.787 8.613 38.991 12.187 12.789 3.22 26.028 6.14 37.738 8.667l2.894.624c14.849 3.194 28.027 6.353 40.236 9.643 12.907 4.223 25.405 9.136 37.149 14.602 11.083 5.989 21.888 12.372 32.07 18.466l93.812 56.122-15.191 8.421-84.3-50.429c-10.283-6.155-20.389-12.172-30.664-17.976l-3.474-1.95c-11.758-5.82-24.11-11.14-36.755-15.829-11.699-3.754-24.048-7.317-37.696-10.878l-8.257-2.141c-10.959-2.847-22.15-5.798-33.191-8.973-13.907-3.999-26.402-8.276-38.201-13.075-11.934-4.857-23.372-10.492-34.022-16.762l-1.878-1.116c-10.885-6.542-21.554-14.117-31.716-22.519-9.807-8.105-19.447-17.042-29.472-27.323l-1.878-1.931c-7.8-8.046-15.334-16.143-24.014-25.537l-2.106-2.28c-9.989-10.819-19.25-20.356-28.345-29.185-9.967-8.87-20.342-17.2-30.88-24.79-10.291-6.67-20.91-13.102-31.01-19.154L71.17 0h-3.91l12.012 7.186c10.623 6.356 21.932 13.164 33.066 20.378 10.437 7.52 20.76 15.807 30.647 24.604 9.031 8.771 18.267 18.282 28.237 29.077l4.565 4.94c7.373 7.969 15.399 16.577 23.471 24.848 10.079 10.334 19.771 19.32 29.627 27.469 10.238 8.463 20.983 16.092 31.947 22.682l.512.307c11.127 6.651 23.132 12.612 35.68 17.72 11.863 4.828 24.424 9.129 38.401 13.143 13.393 3.846 27.415 7.479 39.784 10.683l3.168.827c13.095 3.443 24.943 6.873 36.091 10.45 12.542 4.652 24.829 9.943 36.478 15.707 11.436 6.383 22.627 13.042 34.038 19.872l83.312 49.837-15.188 8.419-83.375-49.87c-8.949-5.339-17.01-10.109-25.31-14.885l-1.167-.669a445.552 445.552 0 00-36.095-16.888c-12.157-4.498-25.091-8.851-38.44-12.94l-12.683-3.877c-3.222-.987-6.465-1.985-9.711-2.992a1326.146 1326.146 0 01-16.497-5.223c-13.752-4.464-26.065-9.053-37.641-14.029-12.329-5.297-24.177-11.33-35.222-17.93-11.016-6.575-21.952-14.167-32.423-22.488l-.885-.709-.885-.715c-8.445-6.798-16.887-14.192-25.668-22.487l-1.74-1.647-.875-.833c-6.61-6.333-13.23-12.856-19.721-19.291l-9.127-9.06c-9.831-9.756-19.681-19.025-29.305-27.578a450.321 450.321 0 00-31.508-23.698l-1.346-.838c-9.307-5.829-18.72-11.514-28.315-17.26L37.99 0h-3.896l36.507 21.838c7.908 4.73 15.682 9.398 23.36 14.11l2.923 1.805 2.914 1.81c.417.26.836.52 1.254.778.894.554 1.789 1.109 2.679 1.668a448.243 448.243 0 0131.305 23.547c9.573 8.506 19.396 17.751 29.196 27.478l9.203 9.136c6.472 6.417 13.074 12.923 19.671 19.24l1.028.976 1.024.969c8.639 8.189 16.952 15.511 25.26 22.246l1.247 1.006.674.544c.32.258.639.517.959.771 10.037 7.981 20.471 15.299 31.122 21.728l1.526.914c11.118 6.645 23.049 12.719 35.457 18.052 11.634 5 24.004 9.611 37.814 14.094 2.744.89 5.505 1.773 8.274 2.649 1.479.467 2.962.927 4.443 1.389l1.234.387c.824.259 1.649.518 2.474.774 3.406 1.057 6.809 2.104 10.189 3.139l12.309 3.763c13.313 4.078 26.21 8.418 38.296 12.889a446.07 446.07 0 0135.864 16.78c9.992 5.735 19.775 11.549 30.386 17.895l78.389 46.892-15.194 8.425-77.43-46.317a3615.384 3615.384 0 00-23.849-14.143 535.697 535.697 0 00-35.491-17.853c-11.788-4.911-24.05-9.655-37.499-14.509l-13.016-4.542c-8.326-2.912-16.772-5.887-25.069-8.901-13.567-4.932-25.698-9.833-37.086-14.982-12.204-5.519-23.993-11.665-35.041-18.267a351.216 351.216 0 01-32.639-22.173c-9.931-7.588-19.948-15.916-30.627-25.458-8.047-7.191-16.135-14.595-24.017-21.83l-5.649-5.187c-10.488-9.436-20.367-17.939-30.228-26.016a533.817 533.817 0 00-32.08-22.7l-2.994-1.831C82.682 46.58 72.182 40.299 62.823 34.704L4.807 0H.912L72.92 43.08A2667.18 2667.18 0 0195.09 56.503a531.987 531.987 0 0131.911 22.578c9.808 8.036 19.665 16.519 30.123 25.928l2.765 2.54c8.788 8.069 17.874 16.411 26.914 24.489 10.716 9.576 20.773 17.935 30.744 25.556 9.896 7.563 20.119 14.569 30.425 20.849l2.402 1.451c11.113 6.641 22.97 12.822 35.243 18.372 11.435 5.17 23.613 10.091 37.228 15.04 8.306 3.017 16.758 5.995 25.089 8.908l13.009 4.54c13.408 4.839 25.642 9.572 37.368 14.457a533.965 533.965 0 0135.304 17.759l2.985 1.755a4160.789 4160.789 0 0122.852 13.576L535.843 320l17.217-9.546.008.005 19.242-10.667-.003-.002 17.213-9.543-.004-.002 17.241-9.558-.003-.002 17.212-9.543-.001-.001 15.193-8.424.015.009 19.243-10.669-.017-.011 15.2-8.423.012.007 19.242-10.679-.011-.007 15.214-8.434.015.009 11.395-6.319.158-8.949-.032-.019.302-17.325.02.012.384-21.951-.018-.01.304-17.347.017.011.383-21.951-.005-.003.302-17.333.004.002.382-21.95-.011-.007.344-19.635L602.072 0h-3.894L719.98 72.867l-.303 17.33-102.535-61.341-7.049-4.107-7.64-4.461c-4.239-2.476-8.479-4.953-12.725-7.424l-6.674-3.872-2.309-1.327A778.468 778.468 0 00567.066 0h-4.202c5.968 3.215 12.285 6.749 19.184 10.726a4181.24 4181.24 0 0113.15 7.649l7.533 4.4c4.465 2.608 8.928 5.216 13.385 7.806l103.532 61.937-.302 17.328-110.945-66.372-19.166-11.105a2476.893 2476.893 0 00-15.007-8.622c-12.604-7.122-24.165-13.031-35.347-18.067A373.292 373.292 0 00525.486 0h-5.465a376.339 376.339 0 0118.035 7.506c11.125 5.01 22.633 10.892 35.182 17.984A2660.44 2660.44 0 01590.989 35.7l12.877 7.464 3.517 2.034 111.918 66.953-.302 17.334-119.342-71.396-12.521-7.206c-7.176-4.127-14.49-8.302-21.782-12.332-12.421-6.827-24.185-12.421-35.962-17.105-1.516-.6-3.046-1.19-4.589-1.77-10.806-4.067-22.282-7.67-34.189-10.734-9.091-2.324-18.353-4.392-27.412-6.295-3.021-.635-6.02-1.253-8.982-1.854L450.3 0h-9.853c2.507.54 5.097 1.08 7.781 1.623l1.19.24c13.106 2.628 27.11 5.54 40.699 9.015a370.4 370.4 0 015.046 1.338c11.707 3.197 22.952 6.92 33.492 11.09 11.72 4.662 23.408 10.222 35.735 16.996 6.44 3.562 12.9 7.237 19.266 10.89l14.983 8.622 120.325 71.983-.302 17.335-93.969-56.217-10.422-6.176c-4.801-2.849-9.609-5.696-14.422-8.543-1.202-.711-2.402-1.423-3.602-2.135a2375.985 2375.985 0 00-5.41-3.203l-3.604-2.12c-9.694-5.69-20.038-11.642-30.765-17.346-12.322-6.525-24.316-11.757-36.67-15.989-12.4-4.23-25.9-7.693-40.126-10.298-13.015-2.383-26.346-4.282-39.321-6.094l-2.987-.417c-16.378-2.284-29.489-4.811-41.267-7.95C384.335 9.511 373.496 5.264 363.804 0h-4.102c10.613 6.161 22.673 11.065 35.873 14.583 11.859 3.16 25.047 5.7 41.505 7.996l5.978.835c12.006 1.685 24.268 3.47 36.248 5.662 14.127 2.587 27.533 6.027 39.839 10.223 12.25 4.2 24.15 9.388 36.378 15.866 12.032 6.395 23.592 13.114 34.293 19.42l9.022 5.336c4.807 2.844 9.613 5.69 14.41 8.537l9.203 5.462 96.153 57.517-.304 17.337-91.088-54.493-1.005-.6-10.289-6.156-.864-.513c-7.208-4.278-14.418-8.556-21.639-12.828l-11.341-6.697-3.644-2.139c-9.796-5.733-20.213-11.667-30.881-17.1-12.225-6.18-24.819-11.15-37.435-14.772-12.55-3.585-26.099-6.252-41.42-8.152-10.731-1.331-21.784-2.408-32.573-3.433l-10.945-1.038c-16.544-1.586-29.916-3.67-42.083-6.562-13.402-3.188-25.541-7.93-36.101-14.107l-1.089-.646C337.306 14.371 329.064 7.818 321.325 0h-2.798c7.986 8.28 16.517 15.224 25.435 20.699l1.109.672c10.943 6.546 23.582 11.549 37.567 14.87 12.256 2.912 25.714 5.011 42.354 6.606l14.532 1.381c9.629.922 19.412 1.904 28.931 3.085 15.215 1.886 28.665 4.534 41.116 8.09 12.489 3.584 24.966 8.509 37.081 14.633 10.619 5.409 21.008 11.325 30.779 17.044l3.696 2.17c10.23 6.033 20.434 12.084 30.622 18.128l106.529 63.712-.304 17.339-110.852-66.315c-4.859-2.885-9.723-5.77-14.591-8.654l-19.185-11.345-2.584-1.516c-11.514-6.739-21.542-12.354-32.112-17.48-12.288-5.92-25.144-10.475-38.208-13.537-12.624-2.959-26.519-5.042-42.481-6.368-7.233-.602-14.611-1.115-21.889-1.597l-13.793-.907-8.66-.584a425.314 425.314 0 01-6.015-.464c-13.793-1.166-25.794-2.905-36.536-5.29-13.526-3.002-25.737-7.657-36.307-13.84l-1.039-.616c-10.685-6.422-20.774-15.094-29.988-25.776-3.723-4.317-7.449-9.01-11.222-14.14z"
            fill="url(#illustration-01)"></path>
    </svg>
    <svg width="720" height="480" viewBox="0 0 1360 578" xmlns="http://www.w3.org/2000/svg">
        <defs>
            <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="illustration-01">
                <stop stop-color="#FFF" offset="0%"></stop>
                <stop stop-color="#EAEAEA" offset="77.402%"></stop>
                <stop stop-color="#DFDFDF" offset="100%"></stop>
            </linearGradient>
        </defs>
        <g fill="url(#illustration-01)" fill-rule="evenodd">
            <circle cx="1232" cy="128" r="128"></circle>
            <circle cx="155" cy="443" r="64"></circle>
        </g>
    </svg>
    <svg style="top: -237px; left: 77vw;" width="720" height="480" viewBox="0 0 1360 578"
        xmlns="http://www.w3.org/2000/svg">
        <defs>
            <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="illustration-01">
                <stop stop-color="#FFF" offset="0%"></stop>
                <stop stop-color="#EAEAEA" offset="77.402%"></stop>
                <stop stop-color="#DFDFDF" offset="100%"></stop>
            </linearGradient>
        </defs>
        <g fill="url(#illustration-01)" fill-rule="evenodd">
            <circle cx="1232" cy="128" r="128"></circle>
            <circle cx="155" cy="443" r="64"></circle>
        </g>
    </svg>


    <div class="d-inline-flex">
        <div id="tutor-welcome-text" class="d-flex justify-content-center flex-wrap">
            <h1>
                Welcome,<br>&nbsp;&nbsp;&nbsp; {{ auth()->user()->full_name }}
            </h1>
        </div>
        <div class="user-avatar-rounded me-2" style="background-image:url('assets/tutors/{{auth()->user()->id}}.jpg')"></div>
    </div>

    <div id="main-body-content" class="mt-5">
        @if (session('status') == 'ok')
            <div class="form_message" style="border-color: var(--display-font-color-2nd)"><strong>{{ session('msg') }}&nbsp;<i class="fa-solid fa-circle-info"></i></strong></div>
        @elseif (session('status') == 'fail' or $errors->any())
            <div class="form_message"><strong>{{ session('msg') ? session('msg') : '' }}&nbsp;<i class="fas fa-times-circle"></i></strong></div>
        @endif
        <h2>Your Courses</h2>
        <div id="course-card-scroll">
            <div class="d-inline-flex" id="course-card-wrap">


                @forelse ($subjects as $subject)
                    <div class="course-card-items">
                        <h4>
                            {{$subject->title}}
                        </h4>
                        <p>
                            {{$subject->description}}
                        </p>
                    </div>
                @empty
                <div class="course-card-items">
                    <h4>
                        {{"empty"}}
                    </h4>
                </div>
                @endforelse



            </div>
        </div>
        <h2 class="mt-4 mb-4">Review</h2>
        <div id="course-statistic-wrap" class="d-inline-flex justify-content-between">
            <div class="d-flex flex-column justify-content-between align-items-start">
                <h3>Tutor</h3>

                @php
                    $dateJoined = date('j M Y', strtotime(auth()->user()->created_at));
                @endphp
                <p>Your account <strong>{{auth()->user()->full_name}}</strong> joined on <strong>{{$dateJoined}}</strong>
                <br>Your registered email is <strong>{{auth()->user()->email}}</strong>
                <br>Your registered phone is  <strong>{{auth()->user()->phone}}</strong>
                <br>Your registered state is  <strong>{{auth()->user()->state->stateOf}}</strong></p>

                <a href="{{url('/addCourse')}}"><P><strong>Edit Your Account <i class="fas fa-long-arrow-alt-right"></i></strong></p></a>
            </div>
            <div class="d-flex flex-column justify-content-between align-items-start">
                <h3>Courses</h3>

                <p>So far you have made a total of <strong>{{$subjects->count()}}</strong> course{{(int)$subjects->count() > 1 ? "s" : ""}} 😊
                    @if (isset($subjects[0]->id))
                        . The last one was
                        <strong>{{$subjects[0]->title}}</strong>

                        on <strong>{{date('j M Y', strtotime($subjects[0]->created_at))}}</strong>
                    @endif
                    — happy coursing tutors!
                </p>
                <a href="{{url('/addCourse')}}"><P><strong>Add More Course <i class="fas fa-long-arrow-alt-right"></i></strong></p></a>
            </div>
        </div>

    </div>
    <button class="addCourseAction" style="visibility: collapse">aaaa</button>
</section>

    <script>
        $(document).ready(() => {
            $('.addCourseAction').click()
            console.log("ADD COURSE")
        })
    </script>

@endsection
