<style>
    .card-custom-img::before {
        position: absolute;
        content: "NO IMAGE";
        line-height: 180px;
        left: 50%;
        transform: translate(-50%);
        z-index: -1;
    }
</style>

<div class="container-xl">
    <h3 class="pl-5 pt-5 d-inline-block">무형문화재 현황</h3>
    <p class="float-right pr-5 pt-5">홈 > 무형문화재 현황</p>
    <hr class="m-2">
    <ul class="nav nav-pills float-right my-3">
        <li class="nav-item">
            <a href="#cultural-album" data-toggle="pill" class="nav-link active">앨범형</a>
        </li>
        <li class="nav-item">
            <a href="#cultural-list" data-toggle="pill" class="nav-link">목록형</a>
        </li>
    </ul>

    <div class="tab-content my-3">
        <div class="tab-pane fade show active" id="cultural-album">
            <div class="row w-100">
            </div>
        </div>
        <div class="tab-pane fade" id="cultural-list">
            <table class="table table-light table-hover my-3">
                <thead class="thead-light">
                    <tr class="text-center">
                        <th>순번</th>
                        <th>종목</th>
                        <th>명칭</th>
                        <th>소재지</th>
                        <th>관리자(단체)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-center">서울</td>
                        <td class="text-center">종묘제례악</td>
                        <td>국가무형문화재 제1호</td>
                        <td>(사)국가무형문화재 종묘제례악보존회</td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td class="text-center">경기 양주시</td>
                        <td class="text-center">양주별산대놀이</td>
                        <td>국가무형문화재 제2호</td>
                        <td>(사)국가무형문화재 제2호 양주별산대놀이보존회</td>
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td class="text-center">서울</td>
                        <td class="text-center">남사당놀이</td>
                        <td>국가무형문화재 제3호</td>
                        <td>남사당놀이보존회</td>
                    </tr>
                    <tr>
                        <td class="text-center">4</td>
                        <td class="text-center">기타</td>
                        <td class="text-center">갓일</td>
                        <td>국가무형문화재 제4호</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">5</td>
                        <td class="text-center">기타</td>
                        <td class="text-center">판소리</td>
                        <td>국가무형문화재 제5호</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">6</td>
                        <td class="text-center">경남 통영시</td>
                        <td class="text-center">통영오광대</td>
                        <td>국가무형문화재 제6호</td>
                        <td>(사)국가무형문화재 제6호 통영오광대보존회</td>
                    </tr>
                    <tr>
                        <td class="text-center">7</td>
                        <td class="text-center">경남 고성군</td>
                        <td class="text-center">고성오광대</td>
                        <td>국가무형문화재 제7호</td>
                        <td>(사)국가무형문화재 제7호 고성오광대보존회</td>
                    </tr>
                    <tr>
                        <td class="text-center">8</td>
                        <td class="text-center">전남 진도군</td>
                        <td class="text-center">강강술래</td>
                        <td>국가무형문화재 제8호</td>
                        <td>(사)국가무형문화재 강강술래보존회</td>
                    </tr>
                    <tr>
                        <td class="text-center">9</td>
                        <td class="text-center">충남 부여군</td>
                        <td class="text-center">은산별신제</td>
                        <td>국가무형문화재 제9호</td>
                        <td>(사)국가무형문화재 은산별신제</td>
                    </tr>
                    <tr>
                        <td class="text-center">10</td>
                        <td class="text-center">강원 원주시</td>
                        <td class="text-center">나전장</td>
                        <td>국가무형문화재 제10호</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center" id="cultural-pagination">
        </ul>
    </nav>
</div>

<script>
    let totalCnt = -1;
    let currentIndex = 1;
    let lastestIndex = -1;

    $("html").ready(function() {
        selectIndex(1);
    });

    function selectIndex(obj){
        let str = "";
        let index = -1;

        if(typeof obj == "object"){
            str = $(obj).text();
        }
        else {
            str = obj;
        }

        if(parseInt(str)){
            index = parseInt(str);
        }

        switch(str){
            case "<<":
                currentIndex = 1;
                break;
            case "<":
                if(currentIndex - 1 >= 1) {
                    currentIndex--;
                }
                break;
            case ">":
                if(currentIndex + 1 <= lastestIndex) {
                    currentIndex++;
                }
                break;
            case ">>":
                currentIndex = lastestIndex;
                break;
            default:
                currentIndex = index;
                break;
        }

        let tmp_i = 0;

        if(currentIndex - 5 < 0){
            tmp_i = 1;
        }
        else if(currentIndex - 5 >= 0 && currentIndex + 5 <= lastestIndex){
            tmp_i = currentIndex - 4;
        }
        else if(currentIndex + 5 > lastestIndex){
            tmp_i = lastestIndex - 8;
        }

        $("#cultural-pagination li").remove();

        let parent = $("#cultural-pagination");

        obj = $(`
        <li class="page-item">
            <a class="page-link" onclick="selectIndex(this)">&lt;&lt;</a>
        </li>
        <li class="page-item">
            <a class="page-link" onclick="selectIndex(this)">&lt;</a>
        </li>
        `);

        parent.append(obj);

        for(let i = tmp_i; i < tmp_i + 9; i++){
            obj = $(`
            <li class="page-item">
                <a class="page-link" onclick="selectIndex(this)">${ i }</a>
            </li>
            `);

            if(i == currentIndex){
                obj.addClass("active");
            }

            parent.append(obj);
        }

        obj = $(`
        <li class="page-item">
            <a class="page-link" onclick="selectIndex(this)">&gt;</a>
        </li>
        <li class="page-item">
            <a class="page-link" onclick="selectIndex(this)">&gt;&gt;</a>
        </li>
        `);

        parent.append(obj);

        updateLayout();
    }

    function updateLayout(){
        $.ajax({
            type: "POST",
            url: "xml/nihList.xml",
            dataType: "xml",
            cache: false,
            async: false,
            success: function (response) {
                response = $(response);

                totalCnt = parseInt(response.find("totalCnt").text());
                lastestIndex = parseInt(totalCnt / 8) + 1;

                let items = response.find("item");

                $("#cultural-album .row .col-3").remove();

                let parent = $("#cultural-album .row");
                for(let i = (currentIndex - 1) * 8; i < (currentIndex - 1) * 8 + 8; i++){
                    if(i > totalCnt - 1) {
                        break;
                    }

                    let item = $(items[i]);

                    let imageUrl = "";
                    let ccbaMnm1 = item.find("ccbaMnm1").text();
                    let ccbaKdcd = item.find("ccbaKdcd").text();
                    let ccbaCtcd = item.find("ccbaCtcd").text();
                    let ccbaAsno = item.find("ccbaAsno").text();

                    $.ajax({
                        type: "POST",
                        url: "xml/detail/" + ccbaKdcd + "_" + ccbaCtcd + "_" + ccbaAsno + ".xml",
                        dataType: "xml",
                        cache: false,
                        async: false,
                        success: function (response) {
                            imageUrl = $(response).find("imageUrl").text();
                        }
                    });

                    let obj = $(`
                    <div class="col-3 my-3">
                        <div class="card text-center bg-transparent">
                            <div class="w-100 border-bottom card-custom-img position-relative" style="height: 180px; background: url(xml/nihcImage/${ imageUrl }); background-size: cover; background-position: center center;"></div>
                            <div class="card-body">
                                <h5 class="card-title border-bottom pb-1 m-0">${ ccbaMnm1 }</h5>
                            </div>
                        </div>
                    </div>
                    `);

                    parent.append(obj);
                }
            }
        });
    }
</script>