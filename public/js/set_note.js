$("#note_note").hide();

const noteDice = $(".note-dice");

noteDice.click(function(){
    const val = $(this).data("value");
    $("#note_note").val(val);
    noteDice.each(function() {
        const $die = $(this)
        if($die.data("value") <= val) {
            $die.children(".fas").removeClass("white");
        }
        else {
            $die.children(".fas").addClass("white")
        }
    })
});

noteDice.mouseenter(function(){
    const val = $(this).data("value");
    for(const die of noteDice.toArray().filter(die => $(die).data("value") <= val)) {
        $(die).addClass("note-dice-active");
    }
});

noteDice.mouseleave(() => noteDice.removeClass("note-dice-active"));