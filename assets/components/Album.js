import React from 'react';

export default class Album extends React.Component {
    render() {

        var titulo = 'Los mejores móviles del 2021';

        return (
            <div className='album'>
                <h2>{titulo}</h2>
                <ul>
                    <li>Google Pixel 6</li>
                </ul>
            </div>
        )
    }
}
