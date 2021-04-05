<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="resources/bootstrap-4.5.0-dist/css/bootstrap.css">
    <script src="resources/jquery/jquery-3.5.1.js"></script>
    <script src="resources/bootstrap-4.5.0-dist/js/bootstrap.bundle.js"></script>
    <script src="resources/bootstrap-4.5.0-dist/js/bootstrap.js"></script>
</head>

<body>
    <nav class="nav container-xl p-1">
        <li class="nav-item ml-auto mr-1">
            <div class="dropdown">
                <button id="my-dropdown" class="btn btn-outline-primary dropdown-toggle py-1 px-2"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">한국어</button>
                <div class="dropdown-menu" aria-labelledby="my-dropdown">
                    <a class="dropdown-item active" href="#">한국어</a>
                    <a class="dropdown-item" href="#">English</a>
                    <a class="dropdown-item" href="#">中文(简体)</a>
                    <a class="dropdown-item" href="#">日本語</a>
                </div>
            </div>
        </li>
        <li class="nav-item mx-1">
            <a class="nav-link p-0" href="#">
                <button class="btn btn-primary py-1 px-2" type="button">회원가입</button>
            </a>
        </li>
        <li class="nav-item mx-1">
            <a class="nav-link p-0" href="#">
                <button class="btn btn-primary py-1 px-2" type="button">로그인</button>
            </a>
        </li>
        <li class="nav-item mx-1">
            <a class="nav-link p-0" href="#">
                <button class="btn btn-primary py-1 px-2" type="button">문의하기</button>
            </a>
        </li>
    </nav>
    <hr class="m-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-white position-sticky" style="top: 0px; z-index: 1;">
        <div class="container-xl">
            <a class="navbar-brand" href="index"><img src="resources/images/logo.png" alt="logo" title="logo" height="50px"></a>
            <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="my-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index">무형문화재관리원</a>
                        <div class="sub-nav position-absolute bg-dark w-100 text-white">
                            <div class="container-xl">
                                <h4 class="p-4 border-bottom w-100">무형문화재관리원</h4>
                                <ul>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">일반현황</a>
                                        <ul class="sub-sub-nav">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">설립목적</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="history" class="nav-link">연혁</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">역할</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">주요업무계획</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">조직 및 구성</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="phone" class="nav-link">전화번호</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cultural_status">무형문화재 현황</a>
                        <div class="sub-nav position-absolute bg-dark w-100 text-white">
                            <div class="container-xl">
                                <h4 class="p-4 border-bottom w-100">무형문화재 현황</h4>
                                <ul>
                                    <li class="nav-item">
                                        <a href="cultural_status" class="nav-link">전통 공연·예술</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="cultural_status" class="nav-link">전통기술</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="cultural_status" class="nav-link">전통지식</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="cultural_status" class="nav-link">구전 전통 및 표현</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="cultural_status" class="nav-link">전통 생활관습</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="cultural_status" class="nav-link">의례·의식</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="cultural_status" class="nav-link">전통 놀이·무예</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="cultural_status" class="nav-link">전체 현황</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">행사 안내</a>
                        <div class="sub-nav position-absolute bg-dark w-100 text-white">
                            <div class="container-xl">
                                <h4 class="p-4 border-bottom w-100">행사 안내</h4>
                                <ul>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">공연</a>
                                        <ul class="sub-sub-nav">
                                            <li class="nav-item">
                                                <a href="month_calendar" class="nav-link">월간 공연 일정</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">년간 공연 일정</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">전시</a>
                                        <ul class="sub-sub-nav">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">관람 안내</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">전시실</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">디지털 체험관</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">기획 전시실</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">기획 전시실</a>
                                        <ul class="sub-sub-nav">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">전문 교육</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">사회 교육</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">연간 교육일정</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">전승지원</a>
                        <div class="sub-nav position-absolute bg-dark w-100 text-white">
                            <div class="container-xl">
                                <h4 class="p-4 border-bottom w-100">전승지원</h4>
                                <ul>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">공방</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">공예품 갤러리</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">전수교육관 현황</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">데이터 공개</a>
                        <div class="sub-nav position-absolute bg-dark w-100 text-white">
                            <div class="container-xl">
                                <h4 class="p-4 border-bottom w-100">데이터 공개</h4>
                                <ul>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">무형문화재 현황</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">월간/년간 공연현황</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">공방/공예품/전수교육관 사진 자료</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>