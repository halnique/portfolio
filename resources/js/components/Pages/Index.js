import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Template from '../Templates/Index';

export default class Index extends Component {
    constructor(props) {
        super(props);
        this.state = {
            profiles: [],
        };
    }

    componentDidMount() {
        fetch(
            '/api/profiles',
            {
                method: 'GET',
            },
        ).then(response => response.json(),
        ).then(json => this.setState({
                profiles: json,
            }),
        ).catch(error => console.log(error));
    }

    render() {
        return (
            <Template profiles={this.state.profiles}/>
        );
    }
}

if (document.getElementById('index')) {
    ReactDOM.render(<Index/>, document.getElementById('index'));
}
