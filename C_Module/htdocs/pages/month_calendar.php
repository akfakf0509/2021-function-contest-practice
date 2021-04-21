<style>
    td {
        height: 120px;
        max-width: 0px;
        border-bottom: solid gray 1px !important;
    }
</style>

<?php
    $currentDate = date("Y-m-d");

    if(isset($_GET["year"]) && isset($_GET["month"])) {
        $currentDate = $_GET["year"]."-".$_GET["month"]."-".date("d");
    }

    $currentYear = date("Y", strtotime($currentDate));
    $currentMonth = date("m", strtotime($currentDate));
    
    $prevDate = date("Y-m-d", strtotime($currentDate." -1 month"));
    $prevYear = date("Y", strtotime($prevDate));
    $prevMonth = date("m", strtotime($prevDate));
    $nextDate = date("Y-m-d", strtotime($currentDate." +1 month"));
    $nextYear = date("Y", strtotime($nextDate));
    $nextMonth = date("m", strtotime($nextDate));
?>

<div class="container-xl">
    <h3 class="pl-5 pt-5 d-inline-block">월간 공연 일정</h3>
    <p class="float-right pr-5 pt-5">홈 > 행사 안내 > 공연 > 월간 공연 일정</p>
    <hr class="m-2">
    <div class="text-center p-4 w-100 position-relative">
        <button class="btn btn-primary position-absolute" style="right: 0" type="button" onclick="calendarInsertModal()">일정 추가</button>
        <h5 class="d-inline-block text-secondary"><a href="/month_calendar&year=<?=$prevYear?>&month=<?=$prevMonth?>" class="text-secondary text-decoration-none"><?=$prevYear?>년 <?=$prevMonth?>월</a></h5>
        <h4 class="d-inline-block mx-3"><?=$currentYear?>년 <?=$currentMonth?>월</h4>
        <h5 class="d-inline-block text-secondary"><a href="/month_calendar&year=<?=$nextYear?>&month=<?=$nextMonth?>" class="text-secondary text-decoration-none"><?=$nextYear?>년 <?=$nextMonth?>월</a></h5>
    </div>
    <table class="table table-light text-center">
        <thead class="thead-light">
            <tr>
                <th>일</th>
                <th>월</th>
                <th>화</th>
                <th>수</th>
                <th>목</th>
                <th>금</th>
                <th>토</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $centerDate = date("Y-m-01", strtotime($currentDate));
                $centerDayCount = date("t", strtotime($centerDate));
                $count = -date("w", strtotime($centerDate));

                for($i = 0; $i < 6; $i++) {
                    echo "<tr>";

                    for($j = 0; $j < 7; $j++) {
                        $currentId = date("Y-m-d", strtotime($centerDate." ".$count." day"));
                        $currentDay = date("d", strtotime($centerDate." ".$count." day"));

                        if($count < 0 || $count >= $centerDayCount) {
                            echo "<td class='text-secondary' id='".$currentId."'><p>".$currentDay."</p>";
                        }
                        else {
                            echo "<td id='".$currentId."'><p>".$currentDay."</p>";
                        }

                        echo "</td>";

                        $count++;
                    }

                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div>

<div id="calendar-insert-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="calendar-insert-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="calendar-insert-modal-title">일정 추가</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/calendar_insert">
                    <div class="form-group">
                        <label for="calendar-insert-showName">* 공연명</label>
                        <input id="calendar-insert-showName" class="form-control" type="text" name="showName" required>
                    </div>
                    <div class="form-group">
                        <label for="calendar-insert-showDate">* 공연일</label>
                        <input id="calendar-insert-showDate" class="form-control" type="date" name="showDate" required>
                    </div>
                    <div class="form-group">
                        <label for="calendar-insert-showTime">* 공연시간</label>
                        <input id="calendar-insert-showTime" class="form-control" type="time" name="showTime" required>
                    </div>
                    <div class="form-group">
                        <label for="calendar-insert-organizer">주관</label>
                        <input id="calendar-insert-organizer" class="form-control" type="text" name="organizer">
                    </div>
                    <div class="form-group">
                        <label for="calendar-insert-place">공연장소</label>
                        <input id="calendar-insert-place" class="form-control" type="text" name="place">
                    </div>
                    <div class="form-group">
                        <label for="calendar-insert-cast">출연진</label>
                        <input id="calendar-insert-cast" class="form-control" type="text" name="cast">
                    </div>
                    <div class="form-group">
                        <label for="calendar-insert-rm">공연내용</label>
                        <input id="calendar-insert-rm" class="form-control" type="text" name="rm">
                    </div>
                    <button id="calendar-insert-submit" class="submit-button" type="submit">...</button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" onclick="calendarInsertModal()">취소</button>
                <button class="btn btn-primary" type="button" onclick="calendarInsert()">추가</button>
            </div>
        </div>
    </div>
</div>

<div id="calendar-update-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="calendar-update-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="calendar-update-modal-title">일정 수정</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/calendar_update">
                    <input id="calendar-update-showUid" type="hidden" name="showUid">
                    <div class="form-group">
                        <label for="calendar-update-showName">* 공연명</label>
                        <input id="calendar-update-showName" class="form-control" type="text" name="showName" required>
                    </div>
                    <div class="form-group">
                        <label for="calendar-update-showDate">* 공연일</label>
                        <input id="calendar-update-showDate" class="form-control" type="date" name="showDate" required>
                    </div>
                    <div class="form-group">
                        <label for="calendar-update-showTime">* 공연시간</label>
                        <input id="calendar-update-showTime" class="form-control" type="time" name="showTime" required>
                    </div>
                    <div class="form-group">
                        <label for="calendar-update-organizer">주관</label>
                        <input id="calendar-update-organizer" class="form-control" type="text" name="organizer">
                    </div>
                    <div class="form-group">
                        <label for="calendar-update-place">공연장소</label>
                        <input id="calendar-update-place" class="form-control" type="text" name="place">
                    </div>
                    <div class="form-group">
                        <label for="calendar-update-cast">출연진</label>
                        <input id="calendar-update-cast" class="form-control" type="text" name="cast">
                    </div>
                    <div class="form-group">
                        <label for="calendar-update-rm">공연내용</label>
                        <input id="calendar-update-rm" class="form-control" type="text" name="rm">
                    </div>
                    <button id="calendar-update-submit" class="submit-button" type="submit">...</button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger mr-auto" type="button" onclick="calendarDelete()">삭제</button>
                <button class="btn btn-danger" type="button" onclick="calendarUpdateModal()">취소</button>
                <button class="btn btn-primary" type="button" onclick="calendarUpdate()">수정</button>
            </div>
        </div>
    </div>
</div>

<script>
    $("html").ready(function() {
        updateLayout();

        <?php
            if(isset($_GET["id"])) {
                $showlist_result = getRow("SELECT * FROM showlist WHERE showUid = ?", array($_GET["id"]));
        ?>
        $("#calendar-update-showUid").val("<?=$showlist_result->showUid?>");
        $("#calendar-update-showName").val("<?=$showlist_result->showName?>");
        $("#calendar-update-showDate").val("<?=$showlist_result->showDate?>");
        $("#calendar-update-showTime").val("<?=$showlist_result->showTime?>");
        $("#calendar-update-organizer").val("<?=$showlist_result->organizer?>");
        $("#calendar-update-place").val("<?=$showlist_result->place?>");
        $("#calendar-update-cast").val("<?=$showlist_result->cast?>");
        $("#calendar-update-rm").val("<?=$showlist_result->rm?>");
        $("#calendar-update-modal").modal("toggle");
        <?php
            }
        ?>
    });

    function calendarDelete() {
        if(confirm("정말 삭제하시겠습니까?")) {
            location.href = "/calendar_delete&id=<?= isset($_GET["id"]) ? $_GET["id"] : -1 ?>";
        }
    }

    function calendarUpdate() {
        $("#calendar-update-submit").click();
    }

    function calendarUpdateModal(id) {
        if(id) {
            location.href = "month_calendar&year=<?=$currentYear?>&month=<?=$currentMonth?>&id=" + id;
        }
        else {
            $("#calendar-update-modal").modal("toggle");
        }
    }

    function calendarInsert() {
        $("#calendar-insert-submit").click();
    }

    function calendarInsertModal() {
        $("#calendar-insert-modal").modal("toggle");
    }

    function updateLayout() {
        $.ajax({
            type: "POST",
            url: "openAPI/showList.php",
            data: "&searchType=M&year=<?=$currentYear?>&month=<?=$currentMonth?>",
            dataType: "json",
            cache: false,
            async: false,
            success: function (response) {
                response.items.forEach(e => {
                    let parent = $("#" + e.showDate);
                    let showDate = new Date(e.showDate);
                    let now = new Date();

                    let dDayMs = showDate.getTime() - now.getTime();
                    let dDay = Math.ceil(dDayMs / (1000 * 60 * 60 * 24));

                    if(dDay > 0) {
                        dDay = "D-" + Math.abs(dDay);
                    }
                    else if(dDay == 0) {
                        dDay = "D-Day";
                    }
                    else if(dDay < 0 ) {
                        dDay = "D+" + Math.abs(dDay);
                    }
                    
                    let obj = $(`
                    <button class="btn btn-primary w-100 mb-1" type="button" onclick="calendarUpdateModal(${ e.showUid })">${ e.showName }<p class="m-0 border-top">${ dDay }</p></button>
                    `);

                    parent.append(obj);
                });
            },
            error: function(r){
                console.log(r);
            }
        });
    }
</script>