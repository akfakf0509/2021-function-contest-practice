<div class="container-xl">
    <h3 class="pl-5 pt-5 d-inline-block">연혁</h3>
    <p class="float-right pr-5 pt-5">홈 > 일반현황 > 연혁</p>
    <hr class="m-2">
    <button class="btn btn-primary float-right m-3" type="button" onclick="historyInsertModal()">연혁 추가</button>
    <ul class="nav nav-pills nav-justified w-100 my-3" id="history-pills">
    </ul>
    <div class="tab-content" id="history-contents">
    </div>
</div>

<div id="history-insert-modal" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="history-insert-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="history-insert-modal-title">연혁 추가</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="history-insert-title">내용</label>
                    <input id="history-insert-title" class="form-control" type="text" name="history-insert-title">
                </div>
                <div class="form-group">
                    <label for="history-insert-date">날짜</label>
                    <input id="history-insert-date" class="form-control" type="date" name="history-insert-date">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" onclick="historyInsertModal()">취소</button>
                <button class="btn btn-primary" type="button" onclick="historyInsert()">추가</button>
            </div>
        </div>
    </div>
</div>

<div id="history-update-modal" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="history-update-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="history-update-modal-title">연혁 수정</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="history-update-id" type="hidden" name="history-update-id" value="-1">
                <div class="form-group">
                    <label for="history-update-title">내용</label>
                    <input id="history-update-title" class="form-control" type="text" name="history-update-title">
                </div>
                <div class="form-group">
                    <label for="history-update-date">날짜</label>
                    <input id="history-update-date" class="form-control" type="date" name="history-update-date">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" onclick="historyUpdateModal()">취소</button>
                <button class="btn btn-primary" type="button" onclick="historyUpdate()">수정</button>
            </div>
        </div>
    </div>
</div>

<script>
    //연혁 데이터
    let historyData = [];
    //연혁 최신 아이디
    let lastestId = -1;

    //페이지가 전부 로드 되면 데이터 로드
    $("html").ready(function () {
        historyData = JSON.parse(localStorage.getItem("historyData"));

        historyData.forEach(e => {
            if (lastestId < e.id) {
                lastestId = e.id;
            }
        });

        updateLayout();
    });

    //연혁 추가
    function historyInsert() {
        let date = $("#history-insert-date").val();
        let title = $("#history-insert-title").val();

        historyData.push({
            id: ++lastestId,
            title: title,
            date: date
        });

        historySave();
    }

    //연혁 추가 모달 표시/숨김
    function historyInsertModal() {
        $("#history-insert-modal").modal("toggle");
    }

    //연혁 수정
    function historyUpdate() {
        let id = $("#history-update-id").val();
        let title = $("#history-update-title").val();
        let date = $("#history-update-date").val();
        let index = historyFind(id);

        historyData[index].title = title;
        historyData[index].date = date;

        historySave();
    }

    //연혁 수정 모달 표시/숨김
    function historyUpdateModal(obj) {
        let id = $(obj).parent().parent().data("id");

        let index = historyFind(id);
        let data = historyData[index];

        $("#history-update-id").val(data.id);
        $("#history-update-title").val(data.title);
        $("#history-update-date").val(data.date);

        $("#history-update-modal").modal("toggle");
    }

    //연혁 삭제
    function historyDelete(obj) {
        let id = $(obj).parent().parent().data("id");

        let is_delete = confirm("정말 삭제하시겠습니까?");

        if (is_delete) {
            let currentIndex = historyFind(id);

            historyData.splice(currentIndex, 1);

            historySave();
        }
    }

    //연혁 인덱스 찾기
    function historyFind(id) {
        return historyData.findIndex(e => {
            if (e.id == id) {
                return 1;
            }
        })
    }

    //연혁 저장 후 새로곤침
    function historySave() {
        historyData.sort((a, b) => {
            if (a.date > b.date) {
                return -1;
            } else if (a.date <= b.date) {
                return 1;
            }

            return 0;
        });

        localStorage.setItem("historyData", JSON.stringify(historyData));
        location.href = "history";
    }

    //연혁 데이터를 바탕으로 페이지 구성
    function updateLayout() {
        historyData.forEach(e => {
            let currentYear = e.date.split("-")[0];
            let parent = $("#history-" + currentYear);

            if (!parent.html()) {
                parent = $("#history-pills");
                let is_firstItem = false;

                if (!parent.find("li").html()) {
                    is_firstItem = true;
                }

                let obj = $(`
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#history-${ currentYear }">${ currentYear }</a>
                </li>
                `);

                if (is_firstItem) {
                    obj.find("a").addClass("active");
                }

                parent.append(obj);

                parent = $("#history-contents");

                obj = $(`
                <div class="tab-pane fade" id="history-${ currentYear }">
                    <table class="table table-light">
                        <tbody>
                        </tbody>
                    </table>
                </div>
                `);

                if (is_firstItem) {
                    obj.addClass("show active");
                }

                parent.append(obj);
            }

            parent = $("#history-" + currentYear);
            parent = parent.find("tbody");

            let obj = $(`
            <tr data-id="${ e.id }">
                <td>${ e.date }</td>
                <td>${ e.title }</td>
                <td>
                    <button class="btn btn-primary" type="button" onclick="historyUpdateModal(this)">수정</button>
                    <button class="btn btn-danger" type="button" onclick="historyDelete(this)">삭제</button>
                </td>
            </tr>
            `);

            parent.append(obj);
        });
    }
</script>