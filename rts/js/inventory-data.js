/* Sample inventory for the design mock-up.
   Replace with the live inventory feed once its format is confirmed (see design revisions, section 4). */
window.RTS_INVENTORY = [
  { id: 1,  stock: 'RTS-24118', year: 2020, make: 'International', model: 'HV613',          type: 'Dump Truck',      duty: 'Heavy',  price: 129900, miles: 86400,  engine: 'Cummins L9 450hp',  trans: 'Allison 4500 RDS', gvwr: 66000, wb: 230, img: 'images/hero-3.jpg',         tags: ['tandem', 'construction', 'steel body'] },
  { id: 2,  stock: 'RTS-24102', year: 2019, make: 'Kenworth',      model: 'T800',           type: 'Day Cab',         duty: 'Heavy',  price: 84500,  miles: 412000, engine: 'Cummins X15 500hp', trans: 'Eaton 18-speed',   gvwr: 52000, wb: 204, img: 'images/gallery/g06.jpg',    tags: ['tractor', 'tandem', 'hauling'] },
  { id: 3,  stock: 'RTS-24131', year: 2021, make: 'Freightliner',  model: 'M2 106',         type: 'Dump Truck',      duty: 'Heavy',  price: 118500, miles: 64200,  engine: 'Cummins L9 350hp',  trans: 'Allison 3000 RDS', gvwr: 54000, wb: 216, img: 'images/gallery/g11.jpg',    tags: ['tandem', 'construction'] },
  { id: 4,  stock: 'RTS-24087', year: 2018, make: 'Freightliner',  model: 'M2 106',         type: 'Flatbed',         duty: 'Medium', price: 58900,  miles: 158300, engine: 'Cummins B6.7 260hp',trans: 'Allison 2500 RDS', gvwr: 33000, wb: 254, img: 'images/gallery/g01.jpg',    tags: ['22 ft bed', 'cdl', 'landscape'] },
  { id: 5,  stock: 'RTS-24140', year: 2022, make: 'International', model: 'MV607',          type: 'Cab & Chassis',   duty: 'Medium', price: 79900,  miles: 38700,  engine: 'Cummins B6.7 300hp',trans: 'Allison 3000 RDS', gvwr: 33000, wb: 218, img: 'images/v2/frame.jpg',       tags: ['ready to upfit', 'cdl'] },
  { id: 6,  stock: 'RTS-24095', year: 2019, make: 'Freightliner',  model: 'M2 106',         type: 'Box Truck',       duty: 'Medium', price: 52500,  miles: 171900, engine: 'Cummins B6.7 260hp',trans: 'Allison 2500 RDS', gvwr: 25999, wb: 236, img: 'images/gallery/g10.jpg',    tags: ['26 ft box', 'non-cdl', 'lift gate'] },
  { id: 7,  stock: 'RTS-24122', year: 2020, make: 'Mack',          model: 'Granite GR64F',  type: 'Dump Truck',      duty: 'Heavy',  price: 139500, miles: 91200,  engine: 'Mack MP8 445hp',    trans: 'mDRIVE HD',        gvwr: 66000, wb: 222, img: 'images/v2/dump-body.jpg',   tags: ['tri-axle', 'construction'] },
  { id: 8,  stock: 'RTS-24076', year: 2017, make: 'International', model: '4300',           type: 'Box Truck',       duty: 'Medium', price: 38900,  miles: 214600, engine: 'Cummins ISB 220hp', trans: 'Allison 2500',     gvwr: 25500, wb: 218, img: 'images/gallery/g12.jpg',    tags: ['24 ft box', 'non-cdl'] },
  { id: 9,  stock: 'RTS-24137', year: 2021, make: 'Peterbilt',     model: '567',            type: 'Cab & Chassis',   duty: 'Heavy',  price: 112900, miles: 72400,  engine: 'PACCAR MX-13 455hp',trans: 'Eaton 10-speed',   gvwr: 66000, wb: 240, img: 'images/v2/build.jpg',       tags: ['ready to upfit', 'tandem'] },
  { id: 10, stock: 'RTS-24109', year: 2019, make: 'Freightliner',  model: 'M2 106',         type: 'Flatbed',         duty: 'Medium', price: 61500,  miles: 132800, engine: 'Cummins B6.7 280hp',trans: 'Allison 3000 RDS', gvwr: 35000, wb: 266, img: 'images/v2/flatbed.jpg',     tags: ['24 ft bed', 'cdl'] },
  { id: 11, stock: 'RTS-24114', year: 2018, make: 'Kenworth',      model: 'T370',           type: 'Rollback',        duty: 'Medium', price: 74900,  miles: 118500, engine: 'PACCAR PX-9 300hp', trans: 'Allison 3000 RDS', gvwr: 33000, wb: 256, img: 'images/gallery/g15.jpg',    tags: ['21 ft deck', 'towing'] },
  { id: 12, stock: 'RTS-24128', year: 2020, make: 'Freightliner',  model: 'Cascadia 126',   type: 'Sleeper',         duty: 'Heavy',  price: 69900,  miles: 438000, engine: 'Detroit DD15 455hp',trans: 'DT12 automated',   gvwr: 52000, wb: 244, img: 'images/gallery/g14.jpg',    tags: ['72 in raised roof', 'long haul'] }
];
window.RTS_TYPES = ['Dump Truck', 'Day Cab', 'Sleeper', 'Box Truck', 'Flatbed', 'Cab & Chassis', 'Rollback'];

/* Shared truck card markup (home featured strip + inventory page) */
window.RTS_card = function (t) {
  return '<article class="tcard" id="stock-' + t.stock + '" data-id="' + t.id + '">' +
    '<div class="tcard__img"><img src="' + t.img + '" alt="' + t.year + ' ' + t.make + ' ' + t.model + '" loading="lazy">' +
      '<span class="tcard__type">' + t.type + '</span><span class="tcard__stock">#' + t.stock + '</span></div>' +
    '<div class="tcard__body">' +
      '<h3>' + t.year + ' ' + t.make + ' ' + t.model + '</h3>' +
      '<div class="tcard__price">$' + t.price.toLocaleString('en-US') + '<small>or finance</small></div>' +
      '<div class="tcard__specs"><span><b>' + t.miles.toLocaleString('en-US') + '</b> mi</span><span><b>' + t.duty + '</b> duty</span><span><b>' + t.wb + '"</b> WB</span></div>' +
      '<div class="tcard__acts"><a href="inventory.html#stock-' + t.stock + '" class="btn btn--red btn--sm" data-open="' + t.id + '"><span>View truck</span></a>' +
      '<a href="quote.html?stock=' + t.stock + '" class="btn btn--line btn--sm"><span>Upfit quote</span></a></div>' +
    '</div></article>';
};
