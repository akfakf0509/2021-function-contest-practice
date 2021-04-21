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

<?php
    $bcodeName = isset($_GET["bcodeName"]) ? $_GET["bcodeName"] : "";
?>

<div class="container-xl">
    <h3 class="pl-5 pt-5 d-inline-block">무형문화재 현황</h3>
    <p class="float-right pr-5 pt-5">홈 > 무형문화재 현황</p>
    <hr class="m-2">

    <button class="btn btn-primary float-left my-4 mr-3" type="button" onclick="culturalInsertModal()">등록</button>
    <ul class="nav nav-pills float-right my-3 mr-3">
        <li class="nav-item">
            <a href="#cultural-album" data-toggle="pill" class="nav-link active" onclick="selectIndex(this)">앨범형</a>
        </li>
        <li class="nav-item">
            <a href="#cultural-list" data-toggle="pill" class="nav-link" onclick="selectIndex(this)">목록형</a>
        </li>
    </ul>

    <div class="tab-content my-3">
        <div class="tab-pane fade show active" id="cultural-album">
            <div class="row w-100">
            </div>
        </div>
        <div class="tab-pane fade" id="cultural-list">
            <table class="table table-light table-hover my-3 text-center">
                <thead class="thead-light">
                    <tr>
                        <th>순번</th>
                        <th>소재지</th>
                        <th>종목</th>
                        <th>명칭</th>
                        <th>관리자(단체)</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center" id="cultural-pagination">
        </ul>
    </nav>
</div>

<div id="cultural-insert-modal" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="cultural-insert-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cultural-insert-modal-title">무형문화재 등록</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="height: 500px; overflow: auto;">
                <form method="post" action="/cultural_insert" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="cultural-insert-ccbaKdcd">* 종목코드</label>
                        <input id="cultural-insert-ccbaKdcd" class="form-control" type="number" name="ccbaKdcd" required>
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-ccbaAsno">* 지정번호</label>
                        <input id="cultural-insert-ccbaAsno" class="form-control" type="number" name="ccbaAsno" required>
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-ccbaCtcd">* 시도코드</label>
                        <input id="cultural-insert-ccbaCtcd" class="form-control" type="number" name="ccbaCtcd">
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-ccbaCpno">연계번호</label>
                        <input id="cultural-insert-ccbaCpno" class="form-control" type="number" name="ccbaCpno">
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-longitude">경도</label>
                        <input id="cultural-insert-longitude" class="form-control" type="number" name="longitude">
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-latitude">위도</label>
                        <input id="cultural-insert-latitude" class="form-control" type="number" name="latitude">
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-ccmaName">* 문화재종목</label>
                        <input id="cultural-insert-ccmaName" class="form-control" type="text" name="ccmaName" required>
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-crltsnoNm">* 지정호수</label>
                        <input id="cultural-insert-crltsnoNm" class="form-control" type="number" name="crltsnoNm" required>
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-ccbaMnm1">* 문화재명(국문)</label>
                        <input id="cultural-insert-ccbaMnm1" class="form-control" type="text" name="ccbaMnm1" required>
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-ccbaMnm2">문화재명(한자)</label>
                        <input id="cultural-insert-ccbaMnm2" class="form-control" type="text" name="ccbaMnm2">
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-gcodeName">문화재분류</label>
                        <input id="cultural-insert-gcodeName" class="form-control" type="text" name="gcodeName">
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-bcodeName">문화재분류2(종류)</label>
                        <input id="cultural-insert-bcodeName" class="form-control" type="text" name="bcodeName">
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-mcodeName">문화재분류3</label>
                        <input id="cultural-insert-mcodeName" class="form-control" type="text" name="mcodeName">
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-scodeName">문화재분류4</label>
                        <input id="cultural-insert-scodeName" class="form-control" type="text" name="scodeName">
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-ccbaQuan">수량</label>
                        <input id="cultural-insert-ccbaQuan" class="form-control" type="number" name="ccbaQuan">
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-ccbaAsdt">지정(등록일)</label>
                        <input id="cultural-insert-ccbaAsdt" class="form-control" type="date" name="ccbaAsdt">
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-ccbaCtcdNm">시도명</label>
                        <input id="cultural-insert-ccbaCtcdNm" class="form-control" type="text" name="ccbaCtcdNm">
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-ccsiName">시군구명</label>
                        <input id="cultural-insert-ccsiName" class="form-control" type="text" name="ccsiName">
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-ccbaLcad">소재지 상세</label>
                        <input id="cultural-insert-ccbaLcad" class="form-control" type="text" name="ccbaLcad">
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-ccceName">시대</label>
                        <input id="cultural-insert-ccceName" class="form-control" type="text" name="ccceName">
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-ccbaPoss">소유자</label>
                        <input id="cultural-insert-ccbaPoss" class="form-control" type="text" name="ccbaPoss">
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-ccbaAdmin">관리자</label>
                        <input id="cultural-insert-ccbaAdmin" class="form-control" type="text" name="ccbaAdmin">
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-ccbaCncl">지정해제여부</label>
                        <input id="cultural-insert-ccbaCncl" class="form-control" type="text" name="ccbaCncl">
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-ccbaCndt">지정해제일</label>
                        <input id="cultural-insert-ccbaCndt" class="form-control" type="date" name="ccbaCndt">
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-image">이미지</label>
                        <input id="cultural-insert-image" class="form-control-file" type="file" name="image">
                    </div>
                    <div class="form-group">
                        <label for="cultural-insert-content">설명</label>
                        <textarea id="cultural-insert-content" class="form-control" name="content" rows="3"></textarea>
                    </div>
                    <button id="cultural-insert-submit" class="submit-button" type="submit">...</button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" onclick="culturalInsertModal()">취소</button>
                <button class="btn btn-primary" type="button" onclick="culturalInsert()">추가</button>
            </div>
        </div>
    </div>
</div>

<div id="cultural-update-modal" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="cultural-update-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cultural-update-modal-title">무형문화재 등록</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="height: 500px; overflow: auto;">
                <form method="post" action="/cultural_update" enctype="multipart/form-data">
                    <input id="cultural-update-nihListKey" type="hidden" name="nihListKey">
                    <div class="form-group">
                        <label for="cultural-update-ccbaKdcd">* 종목코드</label>
                        <input id="cultural-update-ccbaKdcd" class="form-control" type="number" name="ccbaKdcd" required>
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-ccbaAsno">* 지정번호</label>
                        <input id="cultural-update-ccbaAsno" class="form-control" type="number" name="ccbaAsno" required>
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-ccbaCtcd">* 시도코드</label>
                        <input id="cultural-update-ccbaCtcd" class="form-control" type="number" name="ccbaCtcd" required>
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-ccbaCpno">연계번호</label>
                        <input id="cultural-update-ccbaCpno" class="form-control" type="number" name="ccbaCpno">
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-longitude">경도</label>
                        <input id="cultural-update-longitude" class="form-control" type="text" name="longitude">
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-latitude">위도</label>
                        <input id="cultural-update-latitude" class="form-control" type="text" name="latitude">
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-ccmaName">* 문화재종목</label>
                        <input id="cultural-update-ccmaName" class="form-control" type="text" name="ccmaName" required>
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-crltsnoNm">* 지정호수</label>
                        <input id="cultural-update-crltsnoNm" class="form-control" type="number" name="crltsnoNm" required>
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-ccbaMnm1">* 문화재명(국문)</label>
                        <input id="cultural-update-ccbaMnm1" class="form-control" type="text" name="ccbaMnm1" required>
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-ccbaMnm2">문화재명(한자)</label>
                        <input id="cultural-update-ccbaMnm2" class="form-control" type="text" name="ccbaMnm2">
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-gcodeName">문화재분류</label>
                        <input id="cultural-update-gcodeName" class="form-control" type="text" name="gcodeName">
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-bcodeName">문화재분류2(종류)</label>
                        <input id="cultural-update-bcodeName" class="form-control" type="text" name="bcodeName">
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-mcodeName">문화재분류3</label>
                        <input id="cultural-update-mcodeName" class="form-control" type="text" name="mcodeName">
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-scodeName">문화재분류4</label>
                        <input id="cultural-update-scodeName" class="form-control" type="text" name="scodeName">
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-ccbaQuan">수량</label>
                        <input id="cultural-update-ccbaQuan" class="form-control" type="number" name="ccbaQuan">
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-ccbaAsdt">지정(등록일)</label>
                        <input id="cultural-update-ccbaAsdt" class="form-control" type="date" name="ccbaAsdt">
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-ccbaCtcdNm">시도명</label>
                        <input id="cultural-update-ccbaCtcdNm" class="form-control" type="text" name="ccbaCtcdNm">
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-ccsiName">시군구명</label>
                        <input id="cultural-update-ccsiName" class="form-control" type="text" name="ccsiName">
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-ccbaLcad">소재지 상세</label>
                        <input id="cultural-update-ccbaLcad" class="form-control" type="text" name="ccbaLcad">
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-ccceName">시대</label>
                        <input id="cultural-update-ccceName" class="form-control" type="text" name="ccceName">
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-ccbaPoss">소유자</label>
                        <input id="cultural-update-ccbaPoss" class="form-control" type="text" name="ccbaPoss">
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-ccbaAdmin">관리자</label>
                        <input id="cultural-update-ccbaAdmin" class="form-control" type="text" name="ccbaAdmin">
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-ccbaCncl">지정해제여부</label>
                        <input id="cultural-update-ccbaCncl" class="form-control" type="text" name="ccbaCncl">
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-ccbaCndt">지정해제일</label>
                        <input id="cultural-update-ccbaCndt" class="form-control" type="date" name="ccbaCndt">
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-image">이미지</label>
                        <input id="cultural-update-image" class="form-control-file" type="file" name="image">
                    </div>
                    <div class="form-group">
                        <label for="cultural-update-content">설명</label>
                        <textarea id="cultural-update-content" class="form-control" name="content" rows="3"></textarea>
                    </div>
                    <button id="cultural-update-submit" class="submit-button" type="submit">...</button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger mr-auto" type="button" onclick="culturalDelete()">삭제</button>
                <button class="btn btn-danger" type="button" onclick="culturalUpdateModal()">취소</button>
                <button class="btn btn-primary" type="button" onclick="culturalUpdate()">수정</button>
            </div>
        </div>
    </div>
</div>

<script>
    let totalCnt = -1;
    let currentIndex = 1;
    let currentType = "album"
    let lastestIndex = -1;

    $("html").ready(function () {
        selectIndex(1);

        <?php
        if (isset($_GET["id"])) {
            $result = getRow("SELECT * FROM nihlist WHERE nihListKey = ?", array($_GET["id"])); 
        ?>
            $("#cultural-update-modal").modal("toggle");
            $("#cultural-update-nihListKey").val("<?=$result->nihListKey?>");
            $("#cultural-update-ccbaKdcd").val("<?=$result->ccbaKdcd?>");
            $("#cultural-update-ccbaAsno").val("<?=$result->ccbaAsno?>");
            $("#cultural-update-ccbaCtcd").val("<?=$result->ccbaCtcd?>");
            $("#cultural-update-ccbaCpno").val("<?=$result->ccbaCpno?>");
            $("#cultural-update-longitude").val("<?=$result->longitude?>");
            $("#cultural-update-latitude").val("<?=$result->latitude?>");
            $("#cultural-update-ccmaName").val("<?=$result->ccmaName?>");
            $("#cultural-update-crltsnoNm").val("<?=$result->crltsnoNm?>");
            $("#cultural-update-ccbaMnm1").val("<?=$result->ccbaMnm1?>");
            $("#cultural-update-ccbaMnm2").val("<?=$result->ccbaMnm2?>");
            $("#cultural-update-gcodeName").val("<?=$result->gcodeName?>");
            $("#cultural-update-bcodeName").val("<?=$result->bcodeName?>");
            $("#cultural-update-mcodeName").val("<?=$result->mcodeName?>");
            $("#cultural-update-scodeName").val("<?=$result->scodeName?>");
            $("#cultural-update-ccbaQuan").val("<?=$result->ccbaQuan?>");
            $("#cultural-update-ccbaAsdt").val("<?=$result->ccbaAsdt?>");
            $("#cultural-update-ccbaCtcdNm").val("<?=$result->ccbaCtcdNm?>");
            $("#cultural-update-ccsiName").val("<?=$result->ccsiName?>");
            $("#cultural-update-ccbaLcad").val("<?=$result->ccbaLcad?>");
            $("#cultural-update-ccceName").val("<?=$result->ccceName?>");
            $("#cultural-update-ccbaPoss").val("<?=$result->ccbaPoss?>");
            $("#cultural-update-ccbaAdmin").val("<?=$result->ccbaAdmin?>");
            $("#cultural-update-ccbaCncl").val("<?=$result->ccbaCncl?>");
            $("#cultural-update-ccbaCndt").val("<?=$result->ccbaCndt?>");
            $("#cultural-update-content").val(`<?=$result->content?>`); 
        <?php
            } 
        ?>
    });

    function culturalDelete() {
        if (confirm("정말 삭제하시겠습니까?")) {
            location.href = "/cultural_delete&id=<?= isset($_GET["id"]) ? $_GET["id"] : -1 ?>";
        }
    }

    function culturalUpdate() {
        $("#cultural-update-submit").click();
    }

    function culturalUpdateModal(obj) {
        if (obj) {
            location.href = "cultural_status" <?php if ($bcodeName) echo "+ '&bcodeName=".$bcodeName."'"; ?> +"&id=" + $(obj).data("id");
        } else {
            $("#cultural-update-modal").modal("toggle");
        }
    }

    function culturalInsert() {
        $("#cultural-insert-submit").click();
    }

    function culturalInsertModal() {
        $("#cultural-insert-modal").modal("toggle");
    }

    function selectIndex(obj) {
        let str = "";
        let index = -1;

        if (typeof obj == "object") {
            str = $(obj).text();
        } else {
            str = obj;
        }

        if (parseInt(str)) {
            index = parseInt(str);
        }

        switch (str) {
            case "<<":
                currentIndex = 1;
                break;
            case "<":
                if (currentIndex - 1 >= 1) {
                    currentIndex--;
                }
                break;
            case ">":
                if (currentIndex + 1 <= lastestIndex) {
                    currentIndex++;
                }
                break;
            case ">>":
                currentIndex = lastestIndex;
                break;
            case "앨범형":
                currentIndex = 1;
                currentType = "album";
                break;
            case "목록형":
                currentIndex = 1;
                currentType = "list";
                break;
            default:
                currentIndex = index;
                break;
        }

        updateLayout();

        let tmp_i = 0;

        if (currentIndex - 5 < 0) {
            tmp_i = 1;
        } else if (currentIndex - 5 >= 0 && currentIndex + 5 <= lastestIndex) {
            tmp_i = currentIndex - 4;
        } else if (currentIndex + 5 > lastestIndex) {
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

        for (let i = tmp_i; i < tmp_i + 9; i++) {
            if (i < 1 || i > lastestIndex) {
                continue;
            }

            obj = $(`
            <li class="page-item">
                <a class="page-link" onclick="selectIndex(this)">${ i }</a>
            </li>
            `);

            if (i == currentIndex) {
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
    }

    function updateLayout() {
        if (currentType == "album") {
            $.ajax({
                type: "POST",
                url: "openAPI/nihList.php",
                data: "&pageNo=" + currentIndex + "&numOfRows=8&bcodeName=<?=$bcodeName?>",
                dataType: "json",
                cache: false,
                async: false,
                success: function (response) {
                    totalCnt = response.totalCount;
                    lastestIndex = Math.ceil(totalCnt / 8);

                    let items = response.items;

                    $("#cultural-album .row .col-3").remove();

                    let parent = $("#cultural-album .row");
                    items.forEach(item => {
                        let nihListKey = item.nihListKey;
                        let imageUrl = item.image;
                        let ccbaMnm1 = item.ccbaMnm1;

                        let obj = $(`
                        <div class="col-3 my-3" data-id="${ nihListKey }" onclick="culturalUpdateModal(this)">
                            <div class="card text-center bg-transparent">
                                <div class="w-100 border-bottom card-custom-img position-relative" style="height: 180px; background: url(${ imageUrl }); background-size: cover; background-position: center center;"></div>
                                <div class="card-body">
                                    <h5 class="card-title border-bottom pb-1 m-0">${ ccbaMnm1 }</h5>
                                </div>
                            </div>
                        </div>
                        `);

                        parent.append(obj);
                    });
                },
                error: function (r, s, e) {
                    console.log(r.responseText);
                }
            });
        } else if (currentType == "list") {
            $.ajax({
                type: "POST",
                url: "openAPI/nihList.php",
                data: "&pageNo=" + currentIndex + "&numOfRows=10&bcodeName=<?=$bcodeName?>",
                dataType: "json",
                cache: false,
                async: false,
                success: function (response) {
                    totalCnt = response.totalCount;
                    lastestIndex = Math.ceil(totalCnt / 10);

                    let items = response.items;

                    $("#cultural-list tbody tr").remove();

                    let parent = $("#cultural-list tbody");

                    items.forEach(item => {
                        let nihListKey = item.nihListKey;
                        let imageUrl = item.image;
                        let crltsnoNm = item.crltsnoNm;
                        let ccbaLcad = item.ccbaLcad;
                        let bcodeName = item.bcodeName
                        let ccbaMnm1 = item.ccbaMnm1;
                        let ccbaAdmin = item.ccbaAdmin;

                        let obj = $(`
                        <tr data-id="${ nihListKey }" onclick="culturalUpdateModal(this)">
                            <td>${ crltsnoNm }</td>
                            <td>${ ccbaLcad }</td>
                            <td>${ bcodeName }</td>
                            <td>${ ccbaMnm1 }</td>
                            <td>${ ccbaAdmin }</td>
                        </tr>
                        `);

                        parent.append(obj);
                    });
                },
                error: function (r, s, e) {
                    console.log(r.responseText);
                }
            });
        }
    }
</script>