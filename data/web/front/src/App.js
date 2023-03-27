import * as React from 'react';
import logo from './logo.svg';
import './App.css';
import Header from './header/Header';
import Calendare from './calendare/Calendare';
import LeftSideBare from './leftSideBare/LeftSideBare';

function App() {
  return (
    <div>
      <Header></Header>
      <div className='flex-container'>
        <div className='leftSideBare'>
          <LeftSideBare></LeftSideBare>
        </div>
        <div className='calendar'>
<Calendare></Calendare>
        </div>
      </div>
    </div>
   
  );
}

export default App;
