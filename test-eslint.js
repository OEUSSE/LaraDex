// https://www.codewars.com/kata/57c178e16662d0d932000120/train/javascript

function table (results) {
    let match = results[0].match(/\d(:)\d/)[0]
    let teams = results[0].split(' - ').toString().replace(/\d\W/g, '').split(',')
}  

console.log(
    table(
        [
            '6:0 FC Bayern Muenchen - Werder Bremen',
            '-:- Eintracht Frankfurt - Schalke 04',
            '-:- FC Augsburg - VfL Wolfsburg',
            '-:- Hamburger SV - FC Ingolstadt',
            '-:- 1. FC Koeln - SV Darmstadt',
            '-:- Borussia Dortmund - FSV Mainz 05',
            '-:- Borussia Moenchengladbach - Bayer Leverkusen',
            '-:- Hertha BSC Berlin - SC Freiburg',
            '-:- TSG 1899 Hoffenheim - RasenBall Leipzig'
        ]
    )
)
