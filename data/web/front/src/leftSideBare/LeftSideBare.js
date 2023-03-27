import React from 'react'
import './LeftSideBare.css';

function LeftSideBare() {
    return (
        <div>
            <form action="post">
                <input type="text" id="recherche" name="recherche"/>
                    <br></br>

                    <label for="start">start</label>
                    <input type="date" id="start" name="start"/>
                    <span class="validity"></span>

                    <label for="end">end</label>
                    <input type="date" id="end" name="end"/>
                    <span class="validity"></span>

                    <label for="balloons">nb :</label>
                    <input id="balloons" type="number" name="balloons" step="1" min="0" max="100" required/>
                    <span class="validity"></span>

                    <br></br>
                    <input type="submit" value="Envoyer" />
            </form>
            <div className="liste">
                <p><a>Peugeot 407 ...</a></p>
                <p><a>Peugeot 407 ...</a></p>
                <p><a>Peugeot 407 ...</a></p>
                <p><a>Peugeot 407 ...</a></p>
                <p><a>Peugeot 407 ...</a></p>
                <p><a>Peugeot 407 ...</a></p>
                <p><a>Peugeot 407 ...</a></p>
                <p><a>Peugeot 407 ...</a></p>
                <p><a>Peugeot 407 ...</a></p>
                <p><a>Peugeot 407 ...</a></p>
                <p><a>Peugeot 407 ...</a></p>
                <p><a>Peugeot 407 ...</a></p>
                <p><a>Peugeot 407 ...</a></p>
                <p><a>Peugeot 407 ...</a></p>
                <p><a>Peugeot 407 ...</a></p>
                <p><a>Peugeot 407 ...</a></p>
                <p><a>Peugeot 407 ...</a></p>
                <p><a>Peugeot 407 ...</a></p>
                <p><a>Peugeot 407 ...</a></p>
                <p><a>Peugeot 407 ...</a></p>
                <p><a>Peugeot 407 ...</a></p>
                <p><a>Peugeot 407 ...</a></p>
                <p><a>Peugeot 407 ...</a></p>
                <p><a>Peugeot 407 ...</a></p>
            </div>
        </div>
    )
}

export default LeftSideBare