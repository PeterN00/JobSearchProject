<div class="w3-top" style="position: relative;">
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="#" class="w3-bar-item w3-button w3-wide">LOGO</a>
    <!-- Right-sided navbar links -->
      <div class="w3-left w3-hide-small">
        
      <div class="w3-dropdown-hover">
        <button class="w3-button"><i class="fa fa-th"></i> INDUSTRY</button>
          <div class="w3-dropdown-content w3-bar-block w3-border " style="width: 800px">
            <div class="grid-container-6">
              @php
                  foreach($Industries as $industry){
                    // $url=route('employee.industry',['id'=>$industry->id]);
                    echo "<a href='#' class='w3-button'>{$industry->name}</a>";
                  }
              @endphp
            </div>
          </div>
        </div>
        <a href="#" class="w3-bar-item w3-button"><i class='fa fa-search'></i> SEARCH</a>
        <a href="#footer" class="w3-bar-item w3-button"> ABOUT US</a>
      </div>
    <div class="w3-right w3-hide-small">
        <a href="#" onclick="w3_close()" class="w3-bar-item w3-button">FOR EMPLOYEES</a>  
      
      @if(Auth::guard('employee')->check())   
      <div class="w3-dropdown-hover">
        <button class="w3-button"><i class="fa fa-user"></i> {{Auth::guard('employee')->user()->email}}</button>
        <div class="w3-dropdown-content w3-bar-block w3-border w3-right">
          <a href="#" class="w3-bar-item w3-button"><center> LOG OUT</center></a>
        </div>
      </div>
      @else
        <a href="{{ route('employee.login.show') }}" class="w3-bar-item w3-button"><i class="fa fa-user"></i> LOGIN</a>
      @endif
      
    </div>

    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>

    <div class="w3-dropdown-hover">
      <a href="#work" onclick="w3_close()" class="w3-bar-item w3-button">INDUSTRY</a>
      <div class="w3-dropdown-content">
        @php
        foreach($Industries as $industry){
          echo "<a href='#work' onclick='w3_close()' class='w3-bar-item w3-button'>{$industry->name}</a>";
        }
        @endphp
      </div>
    </div>
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button">SEARCH</a>
    <a href="#footer" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT US</a>
  
    <a href="#" onclick="w3_close()" class="w3-bar-item w3-button">FOR EMPLOYEES</a>

  @if(Auth::guard('employee')->check())   
      <div class="w3-dropdown-hover">
        <button class="w3-button"><i class="fa fa-user"></i> {{Auth::guard('employee')->user()->email}}</button>
        <div class="w3-dropdown-content w3-bar-block w3-border w3-right">
          <a href="#" class="w3-bar-item w3-button"><center> LOG OUT</center></a>
        </div>
      </div>
  @else
    <a href="{{ route('employee.login.show') }}" class="w3-bar-item w3-button"><i class="fa fa-user"></i> LOGIN</a>
  @endif
</nav>

<script>

// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>