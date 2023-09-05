package main

import (
    "fmt"
    "net/http"
    "bytes"
    "encoding/json"
    "io/ioutil"
)

type Message struct {
    Username string `json:"username"`
    Password string `json:"password"`
    To       string `json:"to"`
    Text     string `json:"text"`
}

func main() {
    url := "your_single_url"
    method := "POST"

    message := Message{
        Username: "your_username",
        Password: "your_password",
        To:       "9xxxxxxxx",
        Text:     "your_message",
    }

    payload, err := json.Marshal(message)
    if err != nil {
        fmt.Println(err)
        return
    }

    client := &http.Client{}
    req, err := http.NewRequest(method, url, bytes.NewReader(payload))
    if err != nil {
        fmt.Println(err)
        return
    }
    req.Header.Add("Content-Type", "application/json")

    res, err := client.Do(req)
    if err != nil {
        fmt.Println(err)
        return
    }
    defer res.Body.Close()

    body, err := ioutil.ReadAll(res.Body)
    if err != nil {
        fmt.Println(err)
        return
    }
    fmt.Println(string(body))
}
