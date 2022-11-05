@extends('layouts.main')

@section('content')
    <div>
        <h1 class="text-center text-4xl mt-10 text-[#8C6B4F] font-bold">ORDER</h1>
        <div class="grid grid-cols-2 mt-10 order">
            <div class="space-y-10 m-10">
                <div>
                    <h1 class="text-white">Course</h1>
                    <select name="cars" id="cars">
                        <option value="choose">เลือกบริการ</option>
                        <option value="course_1">ทรีตเม้นหน้า</option>
                        <option value="course_2">นวดฝ่าเท้า</option>
                        <option value="course_3">ขัดผิวเจ้าสาว</option>
                    </select>
                </div>
                <div>
                    <h1 class="text-white">Time</h1>
                    <select name="cars" id="cars">
                        <option value="choose">เลือกเวลาเข้ารับบริการ</option>
                        <option value="course_1">12:00 - 12:30</option>
                        <option value="course_2">12:30 - 13:00</option>
                        <option value="course_3">13:00 - 13:30</option>
                    </select>
                </div>
                <div>
                    <h1 class="text-white">Employee</h1>
                    <select name="cars" id="cars">
                        <option value="choose">เลือกผู้ให้บริการ</option>
                        <option value="course_1">ผู้ให้บริการ 1</option>
                        <option value="course_2">ผู้ให้บริการ 2</option>
                        <option value="course_3">ผู้ให้บริการ 3</option>
                    </select>
                </div>
                <button class="text-white submitBtn">
                    <p class="mt-1 mb-1 mr-2 ml-2">ยืนยัน</p>
                </button>
            </div>
            
            <div class="m-10">
                <div class="month">
                    <ul>
                      <li class="prev">&#10094;</li>
                      <li class="next">&#10095;</li>
                      <li>August<br><span style="font-size:18px">2021</span></li>
                    </ul>
                  </div>
                  
                  <ul class="weekdays">
                    <li>Mo</li>
                    <li>Tu</li>
                    <li>We</li>
                    <li>Th</li>
                    <li>Fr</li>
                    <li>Sa</li>
                    <li>Su</li>
                  </ul>
                  
                  <ul class="days">
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                    <li>5</li>
                    <li>6</li>
                    <li>7</li>
                    <li>8</li>
                    <li>9</li>
                    <li><span class="active">10</span></li>
                    <li>11</li>
                    <li>12</li>
                    <li>13</li>
                    <li>14</li>
                    <li>15</li>
                    <li>16</li>
                    <li>17</li>
                    <li>18</li>
                    <li>19</li>
                    <li>20</li>
                    <li>21</li>
                    <li>22</li>
                    <li>23</li>
                    <li>24</li>
                    <li>25</li>
                    <li>26</li>
                    <li>27</li>
                    <li>28</li>
                    <li>29</li>
                    <li>30</li>
                  </ul>
            </div>
        </div>
        
        
    </div>
@endsection