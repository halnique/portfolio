import React, { Component } from 'react';
import * as ReactDOM from 'react-dom';
import { Profile } from "index";
import Template from '../Templates/Top';

type State = {
    profiles: Array<Profile>,
}

class Top extends Component<{}, State> {
    constructor(props: {}) {
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
        ).then(json => this.setState({ profiles: json }),
        ).catch(error => console.log(error));
    }

    render() {
        return (
            <Template profiles={this.state.profiles}/>
        );
    }
}

if (document.getElementById('index')) {
    ReactDOM.render(<Top/>, document.getElementById('index'));
}
