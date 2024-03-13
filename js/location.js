function search() {
    var searchInput = document.getElementById('searchInput').value;
    var para = document.getElementById('para');
    var image = document.getElementById('image');

    if (searchInput === 'Colombo' || searchInput === 'colombo') {
        image.src = "images/colombo.jpeg"
        para.innerHTML = '<p class="boxcover">SkyLine Car Rental Colombo<br>13 2nd Cross Street,Colombo,Sri Lanka<br>0114325267</p>';
        
    } 
    else if (searchInput === 'Kandy' || searchInput === 'kandy') {
        image.src = "images/kandy.jpeg"
        para.innerHTML = '<p class="boxcover">SkyLine Car Rental Kandy<br>B1,Ukuwela,Kandy,Sri Lanka<br>0118234123</p>';
    }
    else if (searchInput === 'Jaffna' || searchInput === 'jaffna') {
        image.src = "images/jaffna.jpg"
        para.innerHTML = '<p class="boxcover">SkyLine Car Rental Jaffna<br>B22,Seruwila,Jaffna,Sri Lanka<br>0115129545</p>';
    }
    else {
        image.src = "images/nofound.png"
        para.innerHTML = 'Sorry, no match found.';
    }
    
}